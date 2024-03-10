<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    /*    public function register(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'type' => 'required|in:employee,student,instructor',
                'password' => 'required'
            ]);
            try {
                $token = Str::random(64);
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'type' => $request->type,
                    'password' => \Hash::make($request->passowrd),
                    'api_token' => $token
                ]);
                return response()->json([
                    'status' => 'user created',
                    'token' => $token
                ]);
            } catch (\Exception $exception) {
                Log::info($exception->getMessage());
                return response()->json([
                    'status' => 'Failed',
                ], 500);
            }
        }

        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ]);
            try {
                $user = User::firstWhere('email', $request->email);
                if (Hash::check($request->password, $user->password)) {
                    $token = Str::random(64);
                    $user->update(['api_token' => $token]);
                    return response()->json([
                        'name' => $user->name,
                        'token' => $token
                    ]);
                } else {
                    return response()->json([
                        'status' => 'Invalid Email or password',
                    ], 500);
                }
            } catch (\Exception $exception) {
                Log::info($exception->getMessage());
                return response()->json([
                    'status' => 'Failed',
                ], 500);
            }
        }*/

    // sanctum
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required|in:employee,student,instructor',
            'password' => 'required'
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'password' => \Hash::make($request->passowrd),
            ]);
            return response()->json([
                'status' => 'user created',
                'token' => $user->createToken('user_token')->plainTextToken
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        try {
            $user = User::firstWhere('email', $request->email);
            if (Hash::check($request->password, $user->password)) {
                $user->tokens()->delete();
                return response()->json([
                    'name' => $user->name,
                    'token' => $user->createToken('user_token')->plainTextToken
                ]);
            } else {
                return response()->json([
                    'status' => 'Invalid Email or password',
                ], 500);
            }
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

    /*    public function my_courses(Request $request)
        {
            $request->validate([
                'token' => 'required|exists:users,api_token'
            ], [
                'token.exists' => 'Invalid User Token'
            ]);
            return response()->json([
                'data' => User::firstWhere('api_token', $request->token)->instractor_courses
            ]);
        }*/

    //sanctum
    public function my_courses(Request $request)
    {
        return response()->json([
            'data' => auth()->user()->instractor_courses
        ]);
    }
}
