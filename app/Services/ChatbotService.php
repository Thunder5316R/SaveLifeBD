<?php

namespace App\Services;

use App\Models\Donor; // তোমার existing Donor model
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotService
{
    // Anthropic API endpoint
    private string $apiUrl = 'https://api.anthropic.com/v1/messages';

    // ========================
    // MAIN FUNCTION
    // User message নেয়, AI reply return করে
    // ========================
    public function getReply(string $userMessage, array $previousMessages = []): string
    {
        // Step 1: User message এ blood group আছে কিনা check করো
        $bloodGroup = $this->detectBloodGroup($userMessage);

        // Step 2: Blood group পেলে DB থেকে donor খোঁজো
        $donorInfo = '';
        if ($bloodGroup) {
            $donorInfo = $this->getDonorInfo($bloodGroup);
        }

        // Step 3: System prompt তৈরি করো
        $systemPrompt = $this->buildSystemPrompt($donorInfo);

        // Step 4: Previous messages format করো (conversation history)
        $messages = $this->formatMessages($previousMessages, $userMessage);

        // Step 5: Anthropic API call করো
        $reply = $this->callAnthropicAPI($systemPrompt, $messages);

        return $reply;
    }

    // ========================
    // BLOOD GROUP DETECT
    // Message থেকে blood group বের করো
    // "O+ blood lagbe" → "O+"
    // ========================
    private function detectBloodGroup(string $message): ?string
    {
        // সব common blood group patterns চেক করো
        $patterns = [
            '/\b(A|B|AB|O)\s*[\+\-]\b/i',      // "O+" or "O -"
            '/\b(A|B|AB|O)\s*(positive|negative)\b/i', // "O positive"
            '/\b(A|B|AB|O)\s*(pos|neg)\b/i',    // "O pos"
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $message, $matches)) {
                // Normalize করো → uppercase + proper format
                $group = strtoupper(trim($matches[1]));
                $sign  = $matches[2] ?? '';

                // positive/negative → +/-
                if (in_array(strtolower($sign), ['positive', 'pos'])) {
                    $sign = '+';
                } elseif (in_array(strtolower($sign), ['negative', 'neg'])) {
                    $sign = '-';
                }

                return $group . $sign; // Example: "O+"
            }
        }

        return null; // Blood group পাওয়া যায়নি
    }

    // ========================
    // DONOR DB QUERY
    // DB থেকে available donor খোঁজো
    // ========================
    private function getDonorInfo(string $bloodGroup): string
    {
        // তোমার Donor model এ যেভাবে data আছে সেটা অনুযায়ী adjust করো
        $donors = Donor::where('blood_group', $bloodGroup)
            ->where('is_available', true) // তোমার column name অনুযায়ী
            ->latest()
            ->limit(3) // সর্বোচ্চ ৩ জন দেখাবো
            ->get(['name', 'phone', 'address']); // তোমার column names

        if ($donors->isEmpty()) {
            return "দুঃখিত, এই মুহূর্তে {$bloodGroup} blood group এর কোনো available donor নেই।";
        }

        // Donor list তৈরি করো (AI এর system prompt এ inject হবে)
        $list = "✅ {$bloodGroup} blood group এর available donors:\n";
        foreach ($donors as $i => $donor) {
            $num = $i + 1;
            $list .= "{$num}. নাম: {$donor->name} | ফোন: {$donor->phone} | এলাকা: {$donor->address}\n";
        }

        return $list;
    }

    // ========================
    // SYSTEM PROMPT
    // AI কে বলছো সে কে এবং কী করবে
    // ========================
    private function buildSystemPrompt(string $donorInfo = ''): string
    {
        $prompt = <<<PROMPT
তুমি LPI Blood Bank (Lakshmipur Polytechnic Institute) এর AI Assistant।
তোমার কাজ:
1. Blood donor খুঁজতে সাহায্য করা
2. Blood donation এর নিয়মকানুন বলা
3. Emergency এ কী করতে হবে guide দেওয়া
4. FAQ এর উত্তর দেওয়া

গুরুত্বপূর্ণ নিয়মাবলী:
- সবসময় বাংলায় উত্তর দাও (user English এ জিজ্ঞেস করলে English এ দাও)
- সংক্ষিপ্ত ও সহজ ভাষায় উত্তর দাও
- Emergency এ সবসময় contact number দাও: +88017-5096-5595
- Email: connectwithsohag@gmail.com
- তুমি doctor নও, medical advice দেবে না

Blood donation সম্পর্কে তথ্য:
- Minimum age: 18 বছর
- Minimum weight: 50 কেজি
- প্রতি 3 মাসে একবার blood দেওয়া যায়
- Donation এর আগে পর্যাপ্ত পানি পান করতে হবে
PROMPT;

        // যদি donor info থাকে, সেটা যোগ করো
        if (!empty($donorInfo)) {
            $prompt .= "\n\nDatabase থেকে পাওয়া তথ্য:\n" . $donorInfo;
            $prompt .= "\nউপরের donor দের তথ্য user কে দাও।";
        }

        return $prompt;
    }

    // ========================
    // MESSAGE FORMAT
    // Anthropic API এর জন্য message array তৈরি
    // ========================
    private function formatMessages(array $previousMessages, string $newMessage): array
    {
        $messages = [];

        // আগের messages যোগ করো (conversation history)
        foreach ($previousMessages as $msg) {
            $messages[] = [
                'role'    => $msg['role'],    // 'user' or 'assistant'
                'content' => $msg['content'],
            ];
        }

        // নতুন user message যোগ করো
        $messages[] = [
            'role'    => 'user',
            'content' => $newMessage,
        ];

        return $messages;
    }

    // ========================
    // ANTHROPIC API CALL
    // Actual API request করো
    // ========================
    private function callAnthropicAPI(string $systemPrompt, array $messages): string
    {
        try {
            $response = Http::withHeaders([
                'x-api-key'         => config('services.anthropic.key'), // .env থেকে
                'anthropic-version' => '2023-06-01',
                'content-type'      => 'application/json',
            ])->timeout(30) // 30 second timeout
            ->post($this->apiUrl, [
                'model' => 'claude-3-haiku-20240307', // সঠিক মডেল নাম // Fast & cheap model
                'max_tokens' => 500,
                'system'     => $systemPrompt,
                'messages'   => $messages,
            ]);

            // API Error check
            if ($response->failed()) {
    // এরর মেসেজটি সরাসরি চ্যাটে দেখাবে যাতে আপনি বুঝতে পারেন সমস্যা কী
    return 'API Error: ' . $response->body(); 
}

            // Response থেকে text বের করো
            $data = $response->json();
            return $data['content'][0]['text'] ?? 'কোনো উত্তর পাওয়া যায়নি।';

        } catch (\Exception $e) {
            Log::error('Chatbot Exception: ' . $e->getMessage());
            return 'একটি সমস্যা হয়েছে। অনুগ্রহ করে পরে আবার চেষ্টা করুন।';
        }
    }
}
