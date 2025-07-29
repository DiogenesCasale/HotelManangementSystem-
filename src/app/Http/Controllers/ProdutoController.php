<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function index(): JsonResponse
    {
        $produtos = Produto::with([
            'comprasProdutos',
            'vendasItens',
            'registrosEstoque'
        ])->get();
        return response()->json($produtos);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nomeProduto' => 'required|string|max:255',
            'codBarra' => 'required|string|unique:tblProduto,codBarra',
            'valorCompra' => 'required|numeric|min:0',
            'qtdAtual' => 'required|integer|min:0',
            'qtdMinima' => 'required|integer|min:0',
            'status' => 'required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function show(int $id): JsonResponse
    {
        $produto = Produto::with([
            'comprasProdutos',
            'vendasItens',
            'registrosEstoque'
        ])->find($id);
        
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $produto = Produto::find($id);
        
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomeProduto' => 'sometimes|required|string|max:255',
            'codBarra' => 'sometimes|required|string|unique:tblProduto,codBarra,' . $id,
            'valorCompra' => 'sometimes|required|numeric|min:0',
            'qtdAtual' => 'sometimes|required|integer|min:0',
            'qtdMinima' => 'sometimes|required|integer|min:0',
            'status' => 'sometimes|required|string',
            'observacao' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $produto->update($request->all());
        return response()->json($produto);
    }

    public function destroy(int $id): JsonResponse
    {
        $produto = Produto::find($id);
        
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();
        return response()->json(null, 204);
    }
} 