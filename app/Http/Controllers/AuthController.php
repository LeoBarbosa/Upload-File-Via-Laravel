<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request) {

        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message'   => 'Invalid credentials',
                'errors'        => $validator->errors()->all()
            ], 422);
        }

        $user = User::where('email', $credentials['email'])->first();

        if(!$user) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }

        $token = JWTAuth::fromUser($user);

        $objectToken = JWTAuth::setToken($token);
        $expiration = JWTAuth::getPayload($objectToken->getToken())->get('exp');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::getPayload()->get('exp'),
            'user_id' => $user->id
        ]);
    }
}
