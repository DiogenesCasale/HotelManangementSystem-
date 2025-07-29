<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    protected $table = 'tblEndereco';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'status',
        'observacao'
    ];

    protected $casts = [
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
} 