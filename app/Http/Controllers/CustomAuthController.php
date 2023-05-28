<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomAuthController extends Controller
{
    function customAuthenticated(Request $request, $user)
    {
        // Check status
        if ($user->status == 1) {
            $this->logout($request);

            // Send message
            throw ValidationException::withMessages([
                $this->username() => [__('Your status is inactive')],
            ]);
        }
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt(array_merge($credentials, ['status' => 1]))) {
            return redirect('/home');
        }

        return redirect('/login');
    }
}
