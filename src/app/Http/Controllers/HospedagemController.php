<?php

namespace App\Http\Controllers;

use App\Models\Hospedagem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class HospedagemController extends Controller
{
    public function index(): JsonResponse
    {
        $hospedagens = Hospedagem::with([
            'usuario',
            'pessoa',
            'quarto',
            'venda',
            'tarifa',
            'adicionais'
        ])->get();
        return response()->json($hospedagens);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idUsuario' => 'required|exists:tblUsuario,id',
            'idPessoa' => 'required|exists:tblPessoa,id',
            'idQuarto' => 'required|exists:tblQuarto,id',
            'idVenda' => 'required|exists:tblVenda,id',
            'idTarifa' => 'required|exists:tblTarifa,id',
            'valorHospedagem' => 'required|numeric|min:0',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date|after:dataInicio'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $hospedagem = Hospedagem::create($request->all());
        return response()->json($hospedagem, 201);
    }

    public function show(int $id): JsonResponse
    {
        $hospedagem = Hospedagem::with([
            'usuario',
            'pessoa',
            'quarto',
            'venda',
            'tarifa',
            'adicionais'
        ])->find($id);
        
        if (!$hospedagem) {
            return response()->json(['message' => 'Hospedagem não encontrada'], 404);
        }

        return response()->json($hospedagem);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $hospedagem = Hospedagem::find($id);
        
        if (!$hospedagem) {
            return response()->json(['message' => 'Hospedagem não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idUsuario' => 'sometimes|required|exists:tblUsuario,id',
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'idQuarto' => 'sometimes|required|exists:tblQuarto,id',
            'idVenda' => 'sometimes|required|exists:tblVenda,id',
            'idTarifa' => 'sometimes|required|exists:tblTarifa,id',
            'valorHospedagem' => 'sometimes|required|numeric|min:0',
            'dataInicio' => 'sometimes|required|date',
            'dataFim' => 'sometimes|required|date|after:dataInicio'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $hospedagem->update($request->all());
        return response()->json($hospedagem);
    }

    public function destroy(int $id): JsonResponse
    {
        $hospedagem = Hospedagem::find($id);
        
        if (!$hospedagem) {
            return response()->json(['message' => 'Hospedagem não encontrada'], 404);
        }

        $hospedagem->delete();
        return response()->json(null, 204);
    }
} 