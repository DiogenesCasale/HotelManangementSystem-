<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(): JsonResponse
    {
        $usuarios = Usuario::with(['pessoa', 'permissao'])->get();
        return response()->json($usuarios);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idPessoa' => 'required|exists:tblPessoa,id',
            'login' => 'required|string|unique:tblUsuario,login',
            'senha' => 'required|string|min:6',
            'idPermissao' => 'required|exists:tblPermissao,id',
            'status' => 'required|integer|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $usuario = Usuario::create($request->all());
        return response()->json($usuario->load(['pessoa', 'permissao']), 201);
    }

    public function show(int $id): JsonResponse
    {
        $usuario = Usuario::with(['pessoa', 'permissao'])->find($id);
        
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        return response()->json($usuario);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'login' => 'sometimes|required|string|unique:tblUsuario,login,' . $id,
            'senha' => 'sometimes|required|string|min:6',
            'idPermissao' => 'sometimes|required|exists:tblPermissao,id',
            'status' => 'sometimes|required|integer|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $usuario->update($request->all());
        return response()->json($usuario->load(['pessoa', 'permissao']));
    }

    public function destroy(int $id): JsonResponse
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'senha' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $usuario = Usuario::where('login', $request->login)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        if ($usuario->status !== 1) {
            return response()->json(['message' => 'Usuário inativo'], 403);
        }

        return response()->json([
            'usuario' => $usuario->load(['pessoa', 'permissao']),
            'token' => $usuario->createToken('auth_token')->plainTextToken
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
} 