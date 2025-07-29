<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HospedagemAdicional extends Model
{
    use HasFactory;

    protected $table = 'hospedagem_adicionais';
    public $timestamps = false;

    protected $fillable = [
        'hospedagem_id',
        'adicional_id',
        'quantidade',
        'valor_unitario',
        'valor_total'
    ];

    protected $casts = [
        'dataCadastro' => 'datetime'
    ];

    public function hospedagem(): BelongsTo
    {
        return $this->belongsTo(Hospedagem::class, 'hospedagem_id');
    }

    public function adicional(): BelongsTo
    {
        return $this->belongsTo(Adicional::class, 'adicional_id');
    }
} 