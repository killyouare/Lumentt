<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\PhoneNumber;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'email' => 'required|email|unique:users|max:256',
            'phone' => ['required', 'unique:users', new PhoneNumber, 'max:16'],
            'password' => 'required|max:256'
        ]);
        User::create([
            'password' => Hash::make($request->password)
        ] + $request->all());
        return response()->json(['data' => [
            'code' => 201,
            'message' => 'User created'
        ]], 201);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            throw new ApiException(401, 'Unauthorized.');
        }

        return $this->respondWithToken($token);
    }
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'data' => [
                'code' => 200,
                'message' => 'User authorizated',
                'user' => [
                    'user_id' => auth()->id(),
                    'user_is_admin' => auth()->user()->is_admin,
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60
                ]
            ]
        ]);
    }
}
