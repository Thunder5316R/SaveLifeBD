<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BloodSearchController extends Controller
{
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
}
