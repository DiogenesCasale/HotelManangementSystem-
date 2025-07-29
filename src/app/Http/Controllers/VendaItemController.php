<?php

namespace App\Http\Controllers;

use App\Models\VendaItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class VendaItemController extends Controller
{
    public function index(): JsonResponse
    {
        $vendaItens = VendaItem::with(['venda', 'produto'])->get();
        return response()->json($vendaItens);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idVenda' => 'required|exists:tblVenda,id',
            'idProduto' => 'required|exists:tblProduto,id',
            'valorUnitario' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $vendaItem = VendaItem::create($request->all());
        return response()->json($vendaItem->load(['venda', 'produto']), 201);
    }

    public function show(int $id): JsonResponse
    {
        $vendaItem = VendaItem::with(['venda', 'produto'])->find($id);
        
        if (!$vendaItem) {
            return response()->json(['message' => 'Item de venda não encontrado'], 404);
        }

        return response()->json($vendaItem);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $vendaItem = VendaItem::find($id);
        
        if (!$vendaItem) {
            return response()->json(['message' => 'Item de venda não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idVenda' => 'sometimes|required|exists:tblVenda,id',
            'idProduto' => 'sometimes|required|exists:tblProduto,id',
            'valorUnitario' => 'sometimes|required|numeric|min:0',
            'quantidade' => 'sometimes|required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $vendaItem->update($request->all());
        return response()->json($vendaItem->load(['venda', 'produto']));
    }

    public function destroy(int $id): JsonResponse
    {
        $vendaItem = VendaItem::find($id);
        
        if (!$vendaItem) {
            return response()->json(['message' => 'Item de venda não encontrado'], 404);
        }

        $vendaItem->delete();
        return response()->json(null, 204);
    }
} 