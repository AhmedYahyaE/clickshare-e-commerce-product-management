<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\APILoginRequest;
use Illuminate\Support\Facades\Auth;

class APIAuthenticationController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/authenticate",
     *     summary="User login and token generation",
     *     description="Authenticate a user and generate a token for authenticated sessions.",
     *     operationId="authenticateUser",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="User credentials for authentication",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     type="object",
     *                     required={"email", "password", "token_name"},
     *                     @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *                     @OA\Property(property="password", type="string", format="password", example="password123"),
     *                     @OA\Property(property="token_name", type="string", example="my-app-token")
     *                 )
     *             )
     *         }
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User authenticated and token generated",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="token", type="string", example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTAxMjM0NTY3OCwiZXhwIjoxNjg3MjMzMTYwfQ.HLpVZp19RReQoYZ6Sg-kHrElPnP4b7_FTA8vsU0E2y4")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized - Invalid credentials",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Unauthorized")
     *         )
     *     )
     * )
     */
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
