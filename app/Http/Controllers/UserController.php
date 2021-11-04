<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    public function Login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hello ' . $user->name . ', your login was successful', 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function signout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out successfully'
        ];
    }

    public function showJobs(User $user)
    {
        return response()->json($user->jobs()->get());
    }
}
