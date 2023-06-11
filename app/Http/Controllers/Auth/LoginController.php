<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'status' => '0'
        ];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                $this->username() => __('No record matches the provided credentials.'),
            ])->redirectTo(route('login'));
        }
        if ($user->status == 1) {
            throw ValidationException::withMessages([
                $this->username() => __('Your account is disabled, Please contact Administrator' ),
            ])->redirectTo(route('login'));
        } elseif ($user->status == 3) {
            throw ValidationException::withMessages([
                $this->username() => __('Your account is disabled, Please contact Administrator.'),
            ])->redirectTo(route('login'));
        }
        return redirect()->intended($this->redirectPath());
    }

    public function username()
    {
        return 'email';
    }
}
