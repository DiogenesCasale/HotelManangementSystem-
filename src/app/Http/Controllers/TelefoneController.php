<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class TelefoneController extends Controller
{
    public function index(): JsonResponse
    {
        $telefones = Telefone::with('pessoa')->get();
        return response()->json($telefones);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idPessoa' => 'required|exists:tblPessoa,id',
            'telefone' => 'required|string|max:20',
            'status' => 'required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $telefone = Telefone::create($request->all());
        return response()->json($telefone->load('pessoa'), 201);
    }

    public function show(int $id): JsonResponse
    {
        $telefone = Telefone::with('pessoa')->find($id);
        
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }

        return response()->json($telefone);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $telefone = Telefone::find($id);
        
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'telefone' => 'sometimes|required|string|max:20',
            'status' => 'sometimes|required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $telefone->update($request->all());
        return response()->json($telefone->load('pessoa'));
    }

    public function destroy(int $id): JsonResponse
    {
        $telefone = Telefone::find($id);
        
        if (!$telefone) {
            return response()->json(['message' => 'Telefone não encontrado'], 404);
        }

        $telefone->delete();
        return response()->json(null, 204);
    }
} 