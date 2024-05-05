<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => [
                "required",
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            ],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }

        return back()
            ->withErrors([
                "email" => "The provided credentials do not match our records.",
            ])
            ->onlyInput("email");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
