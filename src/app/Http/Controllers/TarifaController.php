<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class TarifaController extends Controller
{
    public function index(): JsonResponse
    {
        $tarifas = Tarifa::with('hospedagens')->get();
        return response()->json($tarifas);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'valor' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:255',
            'observacao' => 'nullable|string',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tarifa = Tarifa::create($request->all());
        return response()->json($tarifa->load('hospedagens'), 201);
    }

    public function show(int $id): JsonResponse
    {
        $tarifa = Tarifa::with('hospedagens')->find($id);
        
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa não encontrada'], 404);
        }

        return response()->json($tarifa);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $tarifa = Tarifa::find($id);
        
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'valor' => 'sometimes|required|numeric|min:0',
            'descricao' => 'sometimes|required|string|max:255',
            'observacao' => 'nullable|string',
            'status' => 'sometimes|required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tarifa->update($request->all());
        return response()->json($tarifa->load('hospedagens'));
    }

    public function destroy(int $id): JsonResponse
    {
        $tarifa = Tarifa::find($id);
        
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa não encontrada'], 404);
        }

        $tarifa->delete();
        return response()->json(null, 204);
    }
} 