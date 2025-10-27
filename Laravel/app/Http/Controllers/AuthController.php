<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $token = $request->user()->createToken('token');

            return response()->json([
                "data" => [
                    "token" => $token->plainTextToken,
                ]
            ], 200);
        } else {
            return response()->json([
                "data" => [
                    "message" => "Belépés sikertelen!"
                ]
            ], 401);
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
