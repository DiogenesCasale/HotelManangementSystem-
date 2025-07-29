<?php

namespace App\Http\Controllers;

use App\Models\HospedagemAdicional;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HospedagemAdicionalController extends Controller
{
    public function index(): JsonResponse
    {
        $hospedagemAdicionais = HospedagemAdicional::with(['hospedagem', 'adicional'])->get();
        return response()->json($hospedagemAdicionais);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'idHospedagem' => 'required|integer|exists:tblHospedagem,id',
            'idAdicional' => 'required|integer|exists:tblAdicional,id'
        ]);

        $hospedagemAdicional = HospedagemAdicional::create($validated);
        return response()->json($hospedagemAdicional, 201);
    }

    public function show(int $id): JsonResponse
    {
        $hospedagemAdicional = HospedagemAdicional::with(['hospedagem', 'adicional'])->find($id);
        
        if (!$hospedagemAdicional) {
            return response()->json(['message' => 'Hospedagem Adicional não encontrada'], 404);
        }

        return response()->json($hospedagemAdicional);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $hospedagemAdicional = HospedagemAdicional::find($id);
        
        if (!$hospedagemAdicional) {
            return response()->json(['message' => 'Hospedagem Adicional não encontrada'], 404);
        }

        $validated = $request->validate([
            'idHospedagem' => 'sometimes|required|integer|exists:tblHospedagem,id',
            'idAdicional' => 'sometimes|required|integer|exists:tblAdicional,id'
        ]);

        $hospedagemAdicional->update($validated);
        return response()->json($hospedagemAdicional);
    }

    public function destroy(int $id): JsonResponse
    {
        $hospedagemAdicional = HospedagemAdicional::find($id);
        
        if (!$hospedagemAdicional) {
            return response()->json(['message' => 'Hospedagem Adicional não encontrada'], 404);
        }

        $hospedagemAdicional->delete();
        return response()->json(null, 204);
    }
} 