<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    use HasFactory;

    protected $table = 'adicionais';

    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'valor' => 'decimal:2'
    ];

    public function hospedagemAdicionais()
    {
        return $this->hasMany(HospedagemAdicional::class);
    }
} 