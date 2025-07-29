<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quarto extends Model
{
    protected $table = 'tblQuarto';
    public $timestamps = false;

    protected $fillable = [
        'numeroQuarto',
        'descricao',
        'qtdCama',
        'qtdBanheiro',
        'status'
    ];

    protected $casts = [
        'qtdCama' => 'integer',
        'qtdBanheiro' => 'integer',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function hospedagens(): HasMany
    {
        return $this->hasMany(Hospedagem::class, 'idQuarto');
    }
} 