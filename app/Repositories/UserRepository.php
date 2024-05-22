<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($request) {
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('access_token');
        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken,
        ]);
    }

    public function login($credentials) {
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return (new UserResource($user))->additional([
                'token' => $user->createToken('access_token')->plainTextToken,
            ]);
        }
        return response()->json([
            'message' => 'Incorrect Credentials.',
        ], 401);
    }

    public function logout() {
        Auth::guard('web')->logout();
        $tokenId = Str::before(request()->bearerToken(), '|');
        auth()->user()->tokens()->where('id', $tokenId)->delete();
        return response()->json(['msg' => 'Token Revoke Complete']);
    }
}
