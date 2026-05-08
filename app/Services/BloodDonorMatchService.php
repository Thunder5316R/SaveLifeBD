<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Twilio\Rest\Client;

class BloodDonorMatchService
{
    /**
     * Blood group compatibility chart
     * key = রোগীর blood group, value = যারা দিতে পারবে
     */
    private array $compatibilityChart = [
        'A+'  => ['A+', 'A-', 'O+', 'O-'],
        'A-'  => ['A-', 'O-'],
        'B+'  => ['B+', 'B-', 'O+', 'O-'],
        'B-'  => ['B-', 'O-'],
        'AB+' => ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
        'AB-' => ['A-', 'B-', 'AB-', 'O-'],
        'O+'  => ['O+', 'O-'],
        'O-'  => ['O-'],
    ];

    /**
     * যোগ্য donor খুঁজে বের করো এবং SMS পাঠাও
     */
    public function findAndNotifyDonors(array $requestData): array
    {
        $compatibleGroups = $this->compatibilityChart[$requestData['blood_group']] ?? [$requestData['blood_group']];

        // AI Priority Logic:
        // 1. Blood group match
        // 2. Same district
        // 3. Last donation ৩ মাস আগে (শরীর recover করেছে)
        // 4. সবচেয়ে বেশি দিন আগে donate করেছে তাকে priority দাও

        $donors = User::whereIn('blood_group', $compatibleGroups)
            ->where('district', $requestData['district'])
            ->where('is_donor', true)          // donors table বা users এ is_donor column থাকলে
            ->where(function ($query) {
                $query->whereNull('last_blood_donate')
                      ->orWhere('last_blood_donate', '<=', Carbon::now()->subMonths(3));
            })
            ->orderBy('last_blood_donate', 'asc') // সবচেয়ে আগে donate করেছে তাকে আগে
            ->limit(5)
            ->get();

        if ($donors->isEmpty()) {
            // Same district এ না পেলে সারা দেশ থেকে খোঁজো
            $donors = User::whereIn('blood_group', $compatibleGroups)
                ->where('is_donor', true)
                ->where(function ($query) {
                    $query->whereNull('last_blood_donate')
                          ->orWhere('last_blood_donate', '<=', Carbon::now()->subMonths(3));
                })
                ->orderBy('last_blood_donate', 'asc')
                ->limit(5)
                ->get();
        }

        $notifiedIds = [];
        $smsResults  = [];

        foreach ($donors as $donor) {
            if (!empty($donor->phone)) {
                $result = $this->sendSms($donor->phone, $requestData, $donor->name);
                $smsResults[] = $result;
                if ($result['success']) {
                    $notifiedIds[] = $donor->id;
                }
            }
        }

        return [
            'donors_found'    => $donors->count(),
            'donors_notified' => count($notifiedIds),
            'notified_ids'    => $notifiedIds,
            'sms_results'     => $smsResults,
        ];
    }

    /**
     * Twilio দিয়ে SMS পাঠাও
     */
    private function sendSms(string $phone, array $requestData, string $donorName): array
    {
        try {
            $twilio = new Client(
                config('services.twilio.sid'),
                config('services.twilio.token')
            );

            $message = "🚨 EMERGENCY BLOOD REQUEST\n"
                . "প্রিয় {$donorName},\n"
                . "রোগী: {$requestData['patient_name']}\n"
                . "Blood Group: {$requestData['blood_group']}\n"
                . "হাসপাতাল: {$requestData['hospital_name']}, {$requestData['district']}\n"
                . "যোগাযোগ: {$requestData['contact_number']}\n"
                . "আপনার রক্তদান একটি জীবন বাঁচাতে পারে!\n"
                . "— LPI Blood Bank";

            $twilio->messages->create(
                '+88' . ltrim($phone, '0'), // BD number format
                [
                    'from' => config('services.twilio.from'),
                    'body' => $message,
                ]
            );

            return ['success' => true, 'phone' => $phone];

        } catch (\Exception $e) {
            return ['success' => false, 'phone' => $phone, 'error' => $e->getMessage()];
        }
    }
}