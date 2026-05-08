<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BloodDonorMatchService
{
    /**
     * Blood compatibility chart
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
     * Find suitable donors and send email notifications
     */
    public function findAndNotifyDonors(array $requestData): array
    {
        $compatibleGroups = $this->compatibilityChart[$requestData['blood_group']]
            ?? [$requestData['blood_group']];

        // Same district priority
        $donors = User::whereIn('blood_group', $compatibleGroups)
            ->where('district', $requestData['district'])
            ->where('is_donor', true)
            ->where(function ($query) {
                $query->whereNull('last_blood_donate')
                    ->orWhere(
                        'last_blood_donate',
                        '<=',
                        Carbon::now()->subMonths(3)
                    );
            })
            ->orderBy('last_blood_donate', 'asc')
            ->limit(5)
            ->get();

        // যদি same district এ donor না পাওয়া যায়
        if ($donors->isEmpty()) {

            $donors = User::whereIn('blood_group', $compatibleGroups)
                ->where('is_donor', true)
                ->where(function ($query) {
                    $query->whereNull('last_blood_donate')
                        ->orWhere(
                            'last_blood_donate',
                            '<=',
                            Carbon::now()->subMonths(3)
                        );
                })
                ->orderBy('last_blood_donate', 'asc')
                ->limit(5)
                ->get();
        }

        $notifiedIds = [];
        $mailResults = [];

        foreach ($donors as $donor) {

            if (!empty($donor->email)) {

                $result = $this->sendMail(
                    $donor->email,
                    $requestData,
                    $donor->name
                );

                $mailResults[] = $result;

                if ($result['success']) {
                    $notifiedIds[] = $donor->id;
                }
            }
        }

        return [
            'donors_found'    => $donors->count(),
            'donors_notified' => count($notifiedIds),
            'notified_ids'    => $notifiedIds,
            'mail_results'    => $mailResults,
        ];
    }

    /**
     * Send beautiful emergency email
     */
    private function sendMail(
        string $email,
        array $requestData,
        string $donorName
    ): array {

        try {

            $html = '
            <div style="font-family: Arial, sans-serif; background:#f4f4f4; padding:30px;">

                <div style="
                    max-width:600px;
                    margin:auto;
                    background:#ffffff;
                    border-radius:10px;
                    overflow:hidden;
                    box-shadow:0 0 15px rgba(0,0,0,0.1);
                ">

                    <div style="
                        background:#dc3545;
                        color:#ffffff;
                        padding:25px;
                        text-align:center;
                    ">
                        <h1 style="margin:0;">
                            🚨 Emergency Blood Request
                        </h1>
                    </div>

                    <div style="padding:30px; color:#333333;">

                        <h2>
                            Dear ' . $donorName . ',
                        </h2>

                        <p style="font-size:16px; line-height:1.8;">
                            A patient urgently needs blood donation assistance.
                            Your blood group matches the requirement.
                        </p>

                        <table style="
                            width:100%;
                            border-collapse:collapse;
                            margin-top:20px;
                        ">

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>Patient Name</strong>
                                </td>

                                <td style="padding:12px; border:1px solid #ddd;">
                                    ' . $requestData['patient_name'] . '
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>Blood Group</strong>
                                </td>

                                <td style="
                                    padding:12px;
                                    border:1px solid #ddd;
                                    color:#dc3545;
                                    font-weight:bold;
                                ">
                                    ' . $requestData['blood_group'] . '
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>Hospital</strong>
                                </td>

                                <td style="padding:12px; border:1px solid #ddd;">
                                    ' . $requestData['hospital_name'] . '
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>District</strong>
                                </td>

                                <td style="padding:12px; border:1px solid #ddd;">
                                    ' . $requestData['district'] . '
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>Contact Number</strong>
                                </td>

                                <td style="padding:12px; border:1px solid #ddd;">
                                    ' . $requestData['contact_number'] . '
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:12px; border:1px solid #ddd;">
                                    <strong>Units Needed</strong>
                                </td>

                                <td style="padding:12px; border:1px solid #ddd;">
                                    ' . $requestData['units_needed'] . '
                                </td>
                            </tr>

                        </table>

                        <div style="
                            margin-top:30px;
                            padding:20px;
                            background:#fff3cd;
                            border-left:5px solid #ffc107;
                            border-radius:5px;
                        ">
                            ❤️ Your blood donation can save a life.
                            Please respond as soon as possible.
                        </div>

                        <div style="margin-top:30px; text-align:center;">
                            <a href="tel:' . $requestData['contact_number'] . '"
                               style="
                                    background:#dc3545;
                                    color:#ffffff;
                                    text-decoration:none;
                                    padding:14px 30px;
                                    border-radius:5px;
                                    display:inline-block;
                                    font-weight:bold;
                               ">
                                📞 Contact Now
                            </a>
                        </div>

                    </div>

                    <div style="
                        background:#f8f9fa;
                        padding:20px;
                        text-align:center;
                        color:#777;
                        font-size:14px;
                    ">
                        © ' . date('Y') . ' LPI Blood Bank <br>
                        Saving Lives Through Blood Donation ❤️
                    </div>

                </div>

            </div>';

            Mail::html($html, function ($message) use ($email) {

                $message->to($email)
                    ->subject('🚨 Emergency Blood Request - LPI Blood Bank');
            });

            return [
                'success' => true,
                'email'   => $email,
            ];

        } catch (\Exception $e) {

            return [
                'success' => false,
                'email'   => $email,
                'error'   => $e->getMessage(),
            ];
        }
    }
}