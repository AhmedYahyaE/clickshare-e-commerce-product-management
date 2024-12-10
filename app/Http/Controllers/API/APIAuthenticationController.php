<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\APILoginRequest;
use Illuminate\Support\Facades\Auth;

class APIAuthenticationController extends Controller
{
    public function authenticate(APILoginRequest $request) {
        // If the user authentication is successful, issue/create a token for them
        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ])) {
            // Create a Token for the newly authenticated User (the user who is logging in)
            $token = $request->user()->createToken($request->token_name); // User must send a 'token_name' (just a label) in the request body to create a token

            return [
                'token' => $token->plainTextToken
            ];
        } else { // If user authentication fails, return an error message
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

}
