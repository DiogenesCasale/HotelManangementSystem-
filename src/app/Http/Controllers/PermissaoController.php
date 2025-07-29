<?php

namespace App\Http\Controllers;

use App\Models\Permissao;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PermissaoController extends Controller
{
    public function index(): JsonResponse
    {
        $permissoes = Permissao::with('usuarios')->get();
        return response()->json($permissoes);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'modulos' => 'required|array',
            'modulos.*' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $permissao = Permissao::create($request->all());
        return response()->json($permissao->load('usuarios'), 201);
    }

    public function show(int $id): JsonResponse
    {
        $permissao = Permissao::with('usuarios')->find($id);
        
        if (!$permissao) {
            return response()->json(['message' => 'Permissão não encontrada'], 404);
        }

        return response()->json($permissao);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $permissao = Permissao::find($id);
        
        if (!$permissao) {
            return response()->json(['message' => 'Permissão não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'modulos' => 'required|array',
            'modulos.*' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $permissao->update($request->all());
        return response()->json($permissao->load('usuarios'));
    }

    public function destroy(int $id): JsonResponse
    {
        $permissao = Permissao::find($id);
        
        if (!$permissao) {
            return response()->json(['message' => 'Permissão não encontrada'], 404);
        }

        $permissao->delete();
        return response()->json(null, 204);
    }
} 