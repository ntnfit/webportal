<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   

class AuthAPIController extends BaseController
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        
            // Check the status of the user
            if ($user->status != 0) {
                return response()->json(['error' => 'Your account is disabled.', 'code' => 403], 403);
            }
        
            $expirationTime = now()->addMinutes(30); // Set the expiration time to 30 minutes from now

            // Generate the token and set the expiration time
            $token = $user->createToken('MyApp', ['expires_at' => $expirationTime]);
            
            // Get the plain text token
            $plainTextToken = $token->plainTextToken;
            
            // Store the plain text token and expiration time in the success response
            $success = [
                'token' => $plainTextToken,
                'expiration' => $expirationTime->toDateTimeString(),
                'name' => $user->email,
            ];
            
            // Return the success response
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised', 'code' => 401], 401);
        }
        
        
    }
    public function userlist()
    {     $users =User::all(); 
        return response()->json(['users' => $users], 200);
    }
}
