<?php

namespace App\Http\Controllers;

use App\Models\EmergencyRequest;
use App\Services\BloodDonorMatchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmergencyController extends Controller
{
    public function __construct(private BloodDonorMatchService $matchService)
    {
        $this->middleware('auth');
    }

    /**
     * Emergency request form দেখাও
     */
    public function create()
    {
        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $districts   = $this->getBangladeshDistricts();

        return view('create', compact('bloodGroups', 'districts'));
    }

    /**
     * Emergency request submit এবং AI দিয়ে donor notify করো
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name'   => 'required|string|max:100',
            'blood_group'    => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'district'       => 'required|string',
            'hospital_name'  => 'required|string|max:200',
            'contact_number' => 'required|string|max:15',
            'units_needed'   => 'required|integer|min:1|max:10',
            'note'           => 'nullable|string|max:500',
        ]);

        // Emergency request save করো
        $emergencyRequest = EmergencyRequest::create([
            ...$validated,
            'requested_by' => Auth::id(),
            'status'       => 'pending',
        ]);

        // AI Service দিয়ে donor খুঁজো এবং SMS পাঠাও
        $result = $this->matchService->findAndNotifyDonors($validated);

        // Result database এ update করো
        $emergencyRequest->update([
            'status'             => $result['donors_notified'] > 0 ? 'notified' : 'pending',
            'donors_notified'    => $result['donors_notified'],
            'notified_donor_ids' => $result['notified_ids'],
        ]);

        $message = $result['donors_notified'] > 0
            ? "✅ সফল! {$result['donors_notified']} জন donor কে Email পাঠানো হয়েছে।"
            : "⚠️ দুঃখিত! আপনার criteria অনুযায়ী এই মুহূর্তে কোনো donor পাওয়া যায়নি।";

        return redirect()->back()->with(
            $result['donors_notified'] > 0 ? 'success' : 'warning',
            $message
        );
    }

    /**
     * Admin — সব emergency request দেখাও
     */
    public function adminIndex()
    {
        $this->authorize('admin'); // AdminMiddleware থাকলে

        $requests = EmergencyRequest::with('requester')
            ->latest()
            ->paginate(15);

        return view('admin-index', compact('requests'));
    }

    /**
     * Admin — status update করো
     */
    public function updateStatus(Request $request, EmergencyRequest $emergencyRequest)
    {
        $this->authorize('admin');

        $request->validate([
            'status' => 'required|in:pending,notified,fulfilled,cancelled',
        ]);

        $emergencyRequest->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status আপডেট হয়েছে।');
    }

    private function getBangladeshDistricts(): array
    {
        return [
            'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna', 'Barisal',
            'Sylhet', 'Rangpur', 'Mymensingh', 'Comilla', 'Noakhali',
            'Lakshmipur', 'Feni', 'Cox\'s Bazar', 'Brahmanbaria',
            'Chandpur', 'Gazipur', 'Narayanganj', 'Tangail', 'Jessore',
            'Bogra', 'Dinajpur', 'Pabna', 'Sirajganj', 'Narsingdi',
            'Munshiganj', 'Manikganj', 'Faridpur', 'Madaripur',
            'Shariatpur', 'Gopalganj', 'Kishoreganj', 'Netrokona',
            'Habiganj', 'Moulvibazar', 'Sunamganj', 'Kushtia',
            'Meherpur', 'Chuadanga', 'Jhenaidah', 'Magura', 'Narail',
            'Satkhira', 'Bagerhat', 'Pirojpur', 'Jhalokati', 'Patuakhali',
            'Bhola', 'Barguna', 'Panchagarh', 'Thakurgaon', 'Nilphamari',
            'Lalmonirhat', 'Kurigram', 'Gaibandha', 'Joypurhat',
            'Chapainawabganj', 'Natore', 'Naogaon', 'Jamalpur',
            'Sherpur', 'Sunamganj',
        ];
    }
}