<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hospedagem extends Model
{
    protected $table = 'tblHospedagem';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idPessoa',
        'idQuarto',
        'idVenda',
        'idTarifa',
        'valorHospedagem',
        'dataInicio',
        'dataFim'
    ];

    protected $casts = [
        'valorHospedagem' => 'decimal:2',
        'dataInicio' => 'datetime',
        'dataFim' => 'datetime',
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

    public function quarto(): BelongsTo
    {
        return $this->belongsTo(Quarto::class, 'idQuarto');
    }

    public function venda(): BelongsTo
    {
        return $this->belongsTo(Venda::class, 'idVenda');
    }

    public function tarifa(): BelongsTo
    {
        return $this->belongsTo(Tarifa::class, 'idTarifa');
    }

    public function adicionais(): HasMany
    {
        return $this->hasMany(HospedagemAdicional::class, 'idHospedagem');
    }
} 