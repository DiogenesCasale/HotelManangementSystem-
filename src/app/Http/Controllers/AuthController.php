<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect("/dashboard");
        }
        return view("pages.login");
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        $usuario = User::where('login', $credentials['login'])
            ->where('status', '1')
            ->first();

        if ($usuario && Hash::check($credentials['password'], $usuario->senha)) {
            Auth::login($usuario);
            $request->session()->regenerate();
            return response()->json(['message' => 'Login realizado com sucesso']);
        }

        return response()->json([
            'message' => 'Credenciais inválidas'
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
