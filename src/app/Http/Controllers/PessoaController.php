<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    public function index(): JsonResponse
    {
        $pessoas = Pessoa::with(['endereco', 'telefones', 'documentos'])->get();
        return response()->json($pessoas);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nomePessoa' => 'required|string|max:255',
            'apelido' => 'nullable|string|max:255',
            'cpf_cnpj' => 'required|string|unique:tblPessoa,cpf_cnpj',
            'dataNascimento' => 'required|date',
            'saldo' => 'required|numeric',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pessoa = Pessoa::create($request->all());
        return response()->json($pessoa, 201);
    }

    public function show(int $id): JsonResponse
    {
        $pessoa = Pessoa::with(['endereco', 'telefones', 'documentos'])->find($id);
        
        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }

        return response()->json($pessoa);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $pessoa = Pessoa::find($id);
        
        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomePessoa' => 'sometimes|required|string|max:255',
            'apelido' => 'nullable|string|max:255',
            'cpf_cnpj' => 'sometimes|required|string|unique:tblPessoa,cpf_cnpj,' . $id,
            'dataNascimento' => 'sometimes|required|date',
            'saldo' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pessoa->update($request->all());
        return response()->json($pessoa);
    }

    public function destroy(int $id): JsonResponse
    {
        $pessoa = Pessoa::find($id);
        
        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], 404);
        }

        $pessoa->delete();
        return response()->json(null, 204);
    }
} 