<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();

        if(!$user) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        if(!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid password'], 400);
        }

        $user->tokens()->delete();

        $token = $user->createToken(Str::random(10))->plainTextToken;

        return response()->json(['message' => $token], 200);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            return response()->json(['message' => 'User Already Exists!'], 400);
        }

        $user = User::query()->create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json('', 204);
    }
}
