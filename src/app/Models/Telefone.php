<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Telefone extends Model
{
    protected $table = 'tblTelefone';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'telefone',
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