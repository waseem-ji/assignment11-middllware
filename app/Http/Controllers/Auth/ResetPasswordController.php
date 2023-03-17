<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function index(string $token)
    {
        return view('auth.resetPassword',['token' => $token]);
    }

    public function resetPassword(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required |email',
            'password' => ['required','confirmed',PasswordRule::min(8)]
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),

            function(User $user, string $password) {

                $user->forceFill([
                    'password' => $password
                ]);

                $user->save();



            }

        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

    }
}
