<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Validate register method
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    protected function validateRegister(Request $request)
    {
        $request->validate(\App\Http\Controllers\Auth\RegisterController::$validation_array);
    }

    /**
     *
     * Register user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response;
     */
    public function register(Request $request)
    {
        $this->validateRegister($request);

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->only('first_name', 'last_name', 'email', 'password', 'phone'));

        $token = $user->createToken('auth_token')->plainTextToken;

        $user['token'] = $token;

        return response()->json($user->only('first_name', 'last_name', 'email', 'token'), 200);
    }

    /**
     * Generate a token for user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => __('auth.failed')
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $user['token'] = $token;

        return response()->json($user->only('first_name', 'last_name', 'email', 'token'), 200);
    }
}
