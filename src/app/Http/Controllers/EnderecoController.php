<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class EnderecoController extends Controller
{
    public function index(): JsonResponse
    {
        $enderecos = Endereco::with('pessoa')->get();
        return response()->json($enderecos);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idPessoa' => 'required|exists:tblPessoa,id',
            'cep' => 'required|string|size:8',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|size:2',
            'status' => 'required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $endereco = Endereco::create($request->all());
        return response()->json($endereco->load('pessoa'), 201);
    }

    public function show(int $id): JsonResponse
    {
        $endereco = Endereco::with('pessoa')->find($id);
        
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        return response()->json($endereco);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $endereco = Endereco::find($id);
        
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'cep' => 'sometimes|required|string|size:8',
            'logradouro' => 'sometimes|required|string|max:255',
            'bairro' => 'sometimes|required|string|max:255',
            'numero' => 'sometimes|required|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'cidade' => 'sometimes|required|string|max:255',
            'uf' => 'sometimes|required|string|size:2',
            'status' => 'sometimes|required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $endereco->update($request->all());
        return response()->json($endereco->load('pessoa'));
    }

    public function destroy(int $id): JsonResponse
    {
        $endereco = Endereco::find($id);
        
        if (!$endereco) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        $endereco->delete();
        return response()->json(null, 204);
    }
} 