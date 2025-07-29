<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documento extends Model
{
    protected $table = 'tblDocumento';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'tipo',
        'documento',
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