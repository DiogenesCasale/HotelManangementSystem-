<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Controlador para a API externa, inutilizado por hora
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials))
            return response()->json([
                "message" => "Credenciais inválidas!"
            ])->setStatusCode(401);

        return response()->json([
            "message" => "Login realizado com sucesso!",
            "redirect" => "/dashboard"
        ])->setStatusCode(200);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            "message" => "Logout realizado com sucesso!",
            "redirect" => "/"
        ])->setStatusCode(200);
    }
}
