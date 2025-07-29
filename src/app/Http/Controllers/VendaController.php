<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index(): JsonResponse
    {
        $vendas = Venda::with([
            'usuario',
            'pessoa',
            'itens',
            'hospedagens'
        ])->get();
        return response()->json($vendas);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'idUsuario' => 'required|exists:tblUsuario,id',
            'idPessoa' => 'required|exists:tblPessoa,id',
            'valorTotal' => 'required|numeric|min:0',
            'observacao' => 'nullable|string',
            'itens' => 'required|array|min:1',
            'itens.*.idProduto' => 'required|exists:tblProduto,id',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valorUnitario' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $venda = Venda::create([
                'idUsuario' => $request->idUsuario,
                'idPessoa' => $request->idPessoa,
                'valorTotal' => $request->valorTotal,
                'observacao' => $request->observacao
            ]);

            foreach ($request->itens as $item) {
                $venda->itens()->create([
                    'idProduto' => $item['idProduto'],
                    'quantidade' => $item['quantidade'],
                    'valorUnitario' => $item['valorUnitario']
                ]);
            }

            DB::commit();
            return response()->json($venda->load('itens'), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erro ao criar venda: ' . $e->getMessage()], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        $venda = Venda::with([
            'usuario',
            'pessoa',
            'itens',
            'hospedagens'
        ])->find($id);
        
        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        return response()->json($venda);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $venda = Venda::find($id);
        
        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idUsuario' => 'sometimes|required|exists:tblUsuario,id',
            'idPessoa' => 'sometimes|required|exists:tblPessoa,id',
            'valorTotal' => 'sometimes|required|numeric|min:0',
            'observacao' => 'nullable|string',
            'itens' => 'sometimes|required|array|min:1',
            'itens.*.idProduto' => 'required|exists:tblProduto,id',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valorUnitario' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $venda->update([
                'idUsuario' => $request->idUsuario,
                'idPessoa' => $request->idPessoa,
                'valorTotal' => $request->valorTotal,
                'observacao' => $request->observacao
            ]);

            if ($request->has('itens')) {
                $venda->itens()->delete();
                foreach ($request->itens as $item) {
                    $venda->itens()->create([
                        'idProduto' => $item['idProduto'],
                        'quantidade' => $item['quantidade'],
                        'valorUnitario' => $item['valorUnitario']
                    ]);
                }
            }

            DB::commit();
            return response()->json($venda->load('itens'));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erro ao atualizar venda: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        $venda = Venda::find($id);
        
        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        try {
            DB::beginTransaction();
            $venda->itens()->delete();
            $venda->delete();
            DB::commit();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erro ao excluir venda: ' . $e->getMessage()], 500);
        }
    }
} 