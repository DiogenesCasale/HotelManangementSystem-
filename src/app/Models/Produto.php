<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    protected $table = 'tblProduto';
    public $timestamps = false;

    protected $fillable = [
        'nomeProduto',
        'codBarra',
        'valorCompra',
        'qtdAtual',
        'qtdMinima',
        'status',
        'observacao'
    ];

    protected $casts = [
        'valorCompra' => 'decimal:2',
        'qtdAtual' => 'integer',
        'qtdMinima' => 'integer',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function comprasProdutos(): HasMany
    {
        return $this->hasMany(CompraProduto::class, 'idProduto');
    }

    public function vendasItens(): HasMany
    {
        return $this->hasMany(VendaItem::class, 'idProduto');
    }

    public function registrosEstoque(): HasMany
    {
        return $this->hasMany(RegistroEstoque::class, 'idProduto');
    }
} 