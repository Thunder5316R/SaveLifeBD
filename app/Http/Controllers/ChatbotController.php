<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Services\ChatbotService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    public function __construct(private ChatbotService $chatbotService)
    {
        // ChatbotService automatically inject হবে (Laravel DI)
    }

    // ========================
    // MAIN CHAT ENDPOINT
    // POST /chatbot/message
    // ========================
    public function sendMessage(Request $request): JsonResponse
    {
        // Step 1: Validate করো
        $request->validate([
            'message'    => 'required|string|max:500',
            'session_id' => 'required|string|max:100',
        ]);

        $userMessage = trim($request->message);
        $sessionId   = $request->session_id;

        // Step 2: Session খোঁজো অথবা নতুন তৈরি করো
        $session = ChatSession::firstOrCreate(
            ['session_id' => $sessionId]
        );

        // Step 3: আগের messages load করো (শেষ ১০টা - token limit এর জন্য)
        $previousMessages = ChatMessage::where('chat_session_id', $session->id)
            ->latest()
            ->limit(10)
            ->get()
            ->reverse() // Oldest first (API এর জন্য)
            ->map(fn($msg) => [
                'role'    => $msg->role,
                'content' => $msg->content,
            ])
            ->toArray();

        // Step 4: User message DB তে save করো
        ChatMessage::create([
            'chat_session_id' => $session->id,
            'role'            => 'user',
            'content'         => $userMessage,
        ]);

        // Step 5: AI থেকে reply নাও
        $aiReply = $this->chatbotService->getReply($userMessage, $previousMessages);

        // Step 6: AI reply DB তে save করো
        ChatMessage::create([
            'chat_session_id' => $session->id,
            'role'            => 'assistant',
            'content'         => $aiReply,
        ]);

        // Step 7: JSON response return করো
        return response()->json([
            'success' => true,
            'reply'   => $aiReply,
        ]);
    }

    // ========================
    // CHAT HISTORY LOAD
    // GET /chatbot/history/{session_id}
    // (Optional - page reload এ পুরোনো messages দেখাতে)
    // ========================
    public function getHistory(string $sessionId): JsonResponse
    {
        $session = ChatSession::where('session_id', $sessionId)->first();

        if (!$session) {
            return response()->json(['messages' => []]);
        }

        $messages = ChatMessage::where('chat_session_id', $session->id)
            ->oldest()
            ->get(['role', 'content', 'created_at']);

        return response()->json(['messages' => $messages]);
    }
}
