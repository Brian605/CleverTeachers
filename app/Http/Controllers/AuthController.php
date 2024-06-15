<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

    }
    function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
    );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);

    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}
