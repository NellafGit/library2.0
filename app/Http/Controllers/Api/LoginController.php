<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->only('email', 'password');

        if (!Auth::attempt($user)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised',
            ], 401);
        }

        $token = Auth::user()->createToken(config('app.name'));

        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token->plainTextToken,
        ], 200);
    }

}
