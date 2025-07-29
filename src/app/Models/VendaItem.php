<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendaItem extends Model
{
    protected $table = 'tblVendaItem';
    public $timestamps = false;

    protected $fillable = [
        'idVenda',
        'idProduto',
        'valorUnitario',
        'quantidade'
    ];

    protected $casts = [
        'valorUnitario' => 'decimal:2',
        'quantidade' => 'integer',
        'dataCadastro' => 'datetime'
    ];

    public function venda(): BelongsTo
    {
        return $this->belongsTo(Venda::class, 'idVenda');
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'idProduto');
    }
} 