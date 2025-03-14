<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with(['error' => 'Email atau password salah.']);
        }

        auth()->login($user);

        return redirect()->intended('/administrator');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/'); // You can redirect to any route after logout
    }
}
