<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarifa extends Model
{
    protected $table = 'tblTarifa';
    public $timestamps = false;

    protected $fillable = [
        'valor',
        'descricao',
        'observacao',
        'status'
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function hospedagens(): HasMany
    {
        return $this->hasMany(Hospedagem::class, 'idTarifa');
    }
} 