<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\DonorRecommendationService;
use App\Models\User;

class BloodSearchController extends Controller
{
    public function __construct(private DonorRecommendationService $ai) {}
    public function search(Request $request)
    {
        $search = $request->input('search');
        $filterAddress = $request->input('filter_address');
        
        // unique adress er jonno
        $addressList = DB::table('donars')->distinct()->orderBy('address', 'asc')->pluck('address');

        $donars = null;

        if ($request->filled('search')) {
            $query = DB::table('donars')
                ->where(function($q) use ($search) {
                    $q->where('blood_group', 'like', "%$search%")
                    ->orWhere('firstName', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('mobile', 'like', "%$search%");
                });

            if ($filterAddress) {
                $query->where('address', $filterAddress);
            }

            $donars = $query->get();
        }

        return view('blood-search', compact('donars', 'addressList', 'search', 'filterAddress'));
    }
    /**
     * AI Recommendation endpoint
     */
    public function recommend(Request $request)
    {
        $request->validate([
            'blood_group' => 'required|string',
            'location'    => 'nullable|string',
            'emergency'   => 'nullable|in:low,medium,high',
        ]);

        $bloodGroup = $request->input('blood_group');
        $location   = $request->input('location', '');
        $emergency  = $request->input('emergency', 'medium');

        $donors = $this->ai->recommend($bloodGroup, $location, $emergency);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'count'   => $donors->count(),
                'donors'  => $donors->take(10)->map(fn($d) => [
                    'name'       => $d->name,
                    'blood_group'=> $d->blood_group,
                    'phone'      => $d->phone,
                    'address'    => $d->present_address,
                    'ai_score'   => $d->ai_score,
                    'reason'     => $d->recommendation_reason,
                    'eligible'   => $d->eligibility_label,
                    'donations'  => $d->blood_donate_number,
                    'photo'      => $d->photo,
                ]),
            ]);
        }

        return view('ai-recommend', compact('donors', 'bloodGroup', 'location', 'emergency'));
    }
}
