<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            $user->token = $user->createToken('auth_token')->plainTextToken;

            return response()->json($user);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
