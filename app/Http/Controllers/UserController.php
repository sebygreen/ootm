<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(Request $request)
    {
        if (!Auth::user()->admin) {
            return redirect("/dashboard");
        }

        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "confirmed", Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            "admin" => ["boolean"],
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "admin" => isset($request->admin[0]) ? 1 : 0,
        ]);

        return redirect("/dashboard");
    }

    public function delete(Request $request)
    {
        $current = Auth::id();
        $id = $request->query("id");
        $user = User::find($id);

        if (!Auth::user()->admin || $id === $current || $user->admin) {
            redirect("/dashboard");
        }

        User::destroy($id);
        return redirect("/dashboard");
    }

    public function password(Request $request)
    {
        $current = Auth::id();
        $id = $request->query("id");

        if ($id !== $current) {
            redirect("/dashboard");
        }

        $request->validate([
            "current" => ["required", "current_password"],
            "new" => ["required", "confirmed", Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::find($id)->makeVisible("password");
        $user->password = Hash::make($request->password);
        $user->save();
        $user->makeHidden("password");

        redirect("/dashboard");
    }
}
