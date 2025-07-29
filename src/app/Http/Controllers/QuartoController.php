<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class QuartoController extends Controller
{
    public function index(): JsonResponse
    {
        $quartos = Quarto::with('hospedagens')->get();
        return response()->json($quartos);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'numeroQuarto' => 'required|string|unique:tblQuarto,numeroQuarto',
            'descricao' => 'nullable|string',
            'qtdCama' => 'required|integer|min:1',
            'qtdBanheiro' => 'required|integer|min:1',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $quarto = Quarto::create($request->all());
        return response()->json($quarto, 201);
    }

    public function show(int $id): JsonResponse
    {
        $quarto = Quarto::with('hospedagens')->find($id);
        
        if (!$quarto) {
            return response()->json(['message' => 'Quarto não encontrado'], 404);
        }

        return response()->json($quarto);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $quarto = Quarto::find($id);
        
        if (!$quarto) {
            return response()->json(['message' => 'Quarto não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'numeroQuarto' => 'sometimes|required|string|unique:tblQuarto,numeroQuarto,' . $id,
            'descricao' => 'nullable|string',
            'qtdCama' => 'sometimes|required|integer|min:1',
            'qtdBanheiro' => 'sometimes|required|integer|min:1',
            'status' => 'sometimes|required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $quarto->update($request->all());
        return response()->json($quarto);
    }

    public function destroy(int $id): JsonResponse
    {
        $quarto = Quarto::find($id);
        
        if (!$quarto) {
            return response()->json(['message' => 'Quarto não encontrado'], 404);
        }

        $quarto->delete();
        return response()->json(null, 204);
    }
} 