<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class DonorRecommendationService
{
    /**
     * Score weights (total = 100)
     */
    const WEIGHT_BLOOD_GROUP   = 40; // Must match
    const WEIGHT_ELIGIBILITY   = 30; // 90+ days since last donation
    const WEIGHT_ACTIVITY      = 20; // How recently they donated (active donor)
    const WEIGHT_LOCATION      = 10; // Partial address match

    /**
     * Minimum days between donations
     */
    const MIN_DONATION_GAP_DAYS = 90;

    /**
     * Get AI-recommended donors for a request
     *
     * @param string $bloodGroup  e.g. "O+", "A-"
     * @param string $location    e.g. "Lakshmipur", "Dhaka"
     * @param string $emergency   'high' | 'medium' | 'low'
     * @return \Illuminate\Support\Collection
     */
    public function recommend(string $bloodGroup, string $location = '', string $emergency = 'medium')
    {
        // 1. Get all verified, active donors
        $donors = User::where('status', 1)
            ->where('email_verify', 1)
            ->whereNotNull('blood_group')
            ->get();

        // 2. Score each donor
        $scored = $donors->map(function ($donor) use ($bloodGroup, $location, $emergency) {
            $score = $this->calculateScore($donor, $bloodGroup, $location, $emergency);
            $donor->ai_score        = $score['total'];
            $donor->score_breakdown = $score['breakdown'];
            $donor->eligibility_label = $score['eligibility_label'];
            $donor->recommendation_reason = $score['reason'];
            return $donor;
        });

        // 3. Filter: blood group must match (score > 0 on blood group)
        $filtered = $scored->filter(fn($d) => $d->score_breakdown['blood_group'] > 0);

        // 4. Sort by AI score descending
        return $filtered->sortByDesc('ai_score')->values();
    }

    /**
     * Calculate AI score for a single donor
     */
    private function calculateScore(User $donor, string $bloodGroup, string $location, string $emergency): array
    {
        $breakdown = [
            'blood_group'  => 0,
            'eligibility'  => 0,
            'activity'     => 0,
            'location'     => 0,
        ];
        $reasons = [];

        // ── 1. Blood Group Score (40 pts) ──────────────────────────────────
        if ($this->isCompatible($donor->blood_group, $bloodGroup)) {
            if (strtoupper(trim($donor->blood_group)) === strtoupper(trim($bloodGroup))) {
                $breakdown['blood_group'] = self::WEIGHT_BLOOD_GROUP; // exact match
                $reasons[] = "Exact blood group match ({$donor->blood_group})";
            } else {
                $breakdown['blood_group'] = (int)(self::WEIGHT_BLOOD_GROUP * 0.6); // compatible
                $reasons[] = "Compatible blood group ({$donor->blood_group} → {$bloodGroup})";
            }
        }

        // ── 2. Eligibility Score (30 pts) ──────────────────────────────────
        [$eligScore, $eligLabel] = $this->getEligibilityScore($donor->last_blood_donate);
        $breakdown['eligibility'] = $eligScore;
        if ($eligScore >= self::WEIGHT_ELIGIBILITY) {
            $reasons[] = "Fully eligible to donate";
        } elseif ($eligScore > 0) {
            $reasons[] = "Partially eligible ({$eligLabel})";
        }

        // ── 3. Activity Score (20 pts) ─────────────────────────────────────
        $breakdown['activity'] = $this->getActivityScore($donor->blood_donate_number);
        if ($donor->blood_donate_number >= 5) {
            $reasons[] = "Experienced donor ({$donor->blood_donate_number} donations)";
        }

        // ── 4. Location Score (10 pts) ─────────────────────────────────────
        if (!empty($location) && !empty($donor->present_address)) {
            $locScore = $this->getLocationScore($donor->present_address, $location);
            $breakdown['location'] = $locScore;
            if ($locScore > 0) {
                $reasons[] = "Near your location";
            }
        }

        // ── 5. Emergency Boost ─────────────────────────────────────────────
        $total = array_sum($breakdown);
        if ($emergency === 'high' && $breakdown['eligibility'] === self::WEIGHT_ELIGIBILITY) {
            $total = min(100, $total + 10); // boost fully eligible donors in emergency
        }

        return [
            'total'             => round($total),
            'breakdown'         => $breakdown,
            'eligibility_label' => $eligLabel,
            'reason'            => implode(' • ', $reasons) ?: 'Potential match',
        ];
    }

    /**
     * Blood group compatibility map
     */
    private function isCompatible(string $donorGroup, string $requiredGroup): bool
    {
        $compatibility = [
            'O-'  => ['O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'],
            'O+'  => ['O+', 'A+', 'B+', 'AB+'],
            'A-'  => ['A-', 'A+', 'AB-', 'AB+'],
            'A+'  => ['A+', 'AB+'],
            'B-'  => ['B-', 'B+', 'AB-', 'AB+'],
            'B+'  => ['B+', 'AB+'],
            'AB-' => ['AB-', 'AB+'],
            'AB+' => ['AB+'],
        ];

        $donorKey = strtoupper(trim($donorGroup));
        $reqKey   = strtoupper(trim($requiredGroup));

        return isset($compatibility[$donorKey]) && in_array($reqKey, $compatibility[$donorKey]);
    }

    /**
     * Eligibility score based on last donation date
     * Returns [score, label]
     */
    private function getEligibilityScore(?string $lastDonateDate): array
    {
        if (!$lastDonateDate) {
            return [self::WEIGHT_ELIGIBILITY, 'Never donated (Ready)']; // never donated = fully eligible
        }

        $daysSince = Carbon::parse($lastDonateDate)->diffInDays(now());

        if ($daysSince >= self::MIN_DONATION_GAP_DAYS) {
            return [self::WEIGHT_ELIGIBILITY, 'Eligible (' . $daysSince . ' days ago)'];
        } elseif ($daysSince >= 60) {
            return [(int)(self::WEIGHT_ELIGIBILITY * 0.5), 'Almost eligible (' . $daysSince . ' days ago)'];
        } else {
            return [0, 'Not eligible yet (' . $daysSince . ' days ago)'];
        }
    }

    /**
     * Activity score based on total donations
     */
    private function getActivityScore(int $donationCount): int
    {
        if ($donationCount >= 10) return self::WEIGHT_ACTIVITY;       // 20
        if ($donationCount >= 5)  return (int)(self::WEIGHT_ACTIVITY * 0.8); // 16
        if ($donationCount >= 2)  return (int)(self::WEIGHT_ACTIVITY * 0.5); // 10
        if ($donationCount >= 1)  return (int)(self::WEIGHT_ACTIVITY * 0.3); // 6
        return (int)(self::WEIGHT_ACTIVITY * 0.2); // 4 — new donor, still valuable
    }

    /**
     * Location score — fuzzy match on address string
     */
    private function getLocationScore(string $donorAddress, string $requestedLocation): int
    {
        $donor    = strtolower(trim($donorAddress));
        $location = strtolower(trim($requestedLocation));

        if (str_contains($donor, $location)) {
            return self::WEIGHT_LOCATION; // 10
        }

        // Partial word match
        $words = explode(' ', $location);
        foreach ($words as $word) {
            if (strlen($word) > 3 && str_contains($donor, $word)) {
                return (int)(self::WEIGHT_LOCATION * 0.5); // 5
            }
        }

        return 0;
    }
}