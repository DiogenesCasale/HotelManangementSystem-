<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class DocumentoController extends Controller
{
    public function index(): JsonResponse
    {
        $documentos = Documento::with('pessoa')->get();
        return response()->json($documentos);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idPessoa' => 'required|exists:tblPessoa,id',
            'tipo' => 'required|string|max:50',
            'documento' => 'required|string|max:50',
            'status' => 'required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $documento = Documento::create($request->all());
        return response()->json($documento->load('pessoa'), 201);
    }

    public function show(int $id): JsonResponse
    {
        $documento = Documento::with('pessoa')->find($id);
        
        if (!$documento) {
            return response()->json(['message' => 'Documento não encontrado'], 404);
        }

        return response()->json($documento);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $documento = Documento::find($id);
        
        if (!$documento) {
            return response()->json(['message' => 'Documento não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'tipo' => 'sometimes|required|string|max:50',
            'documento' => 'sometimes|required|string|max:50',
            'status' => 'sometimes|required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $documento->update($request->all());
        return response()->json($documento->load('pessoa'));
    }

    public function destroy(int $id): JsonResponse
    {
        $documento = Documento::find($id);
        
        if (!$documento) {
            return response()->json(['message' => 'Documento não encontrado'], 404);
        }

        $documento->delete();
        return response()->json(null, 204);
    }
} 