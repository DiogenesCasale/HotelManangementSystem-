<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venda extends Model
{
    protected $table = 'tblVenda';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idPessoa',
        'valorTotal',
        'observacao'
    ];

    protected $casts = [
        'valorTotal' => 'decimal:2',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }

    public function itens(): HasMany
    {
        return $this->hasMany(VendaItem::class, 'idVenda');
    }

    public function hospedagens(): HasMany
    {
        return $this->hasMany(Hospedagem::class, 'idVenda');
    }
} 