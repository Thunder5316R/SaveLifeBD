<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function signup()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.sign-up');
    }
    public function signupStore(Request $request){
        $validated = $request->validate([
            'name'              => 'required|string',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|string|max:20',
            'optional_number'   => 'nullable|string|max:20',
            'present_address'   => 'required|string',
            'blood_group'       => 'required|string',
            'weight'            => 'required|numeric',
            'last_blood_donate' => 'nullable|date',
            'photo'             => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'password'          => 'required|min:6|confirmed',
        ]);

        // PHOTO UPLOAD
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/users', 'public');
        }

        //  CREATE USER
        $user = User::create([
            'name'                 => $validated['name'],
            'email'                => $validated['email'],
            'phone'                => $validated['phone'],
            'optional_number'      => $validated['optional_number'] ?? null,
            'present_address'      => $validated['present_address'],
            'blood_group'          => $validated['blood_group'],
            'weight'               => $validated['weight'],
            'last_blood_donate'    => $validated['last_blood_donate'] ?? null,
            'photo'                => $photoPath,
            'documents'            => $validated['documents'] ?? null,
            'email_verify'         => 1,
            'status'               => 1,
            'node'                 => null,
            'blood_donate_number'  => 0,
            'password'             => bcrypt($validated['password']),
        ]);

        // REDIRECT WITH SUCCESS
        return redirect()->route('user.login')->with('success', 'Account created successfully! Login Now.');

    }
    public function loginStore(Request $request){
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No account found with this email.');
        }

        if ($user->email_verify != 1) {
            return back()->with('error', 'Please verify your email before logging in.');
        }

        if ($user->status != 1) {
            return back()->with('error', 'Your account is inactive. Please contact support.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Incorrect password.');
        }

        Auth::login($user, $request->remember_me ? true : false);
        
        session([
            'user_id'   => $user->id,
            'user_name' => $user->name,
        ]);

        return redirect()->route('home')->with('success', 'Login successful!');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
