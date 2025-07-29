<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pessoa extends Model
{
    protected $table = 'tblPessoa';
    public $timestamps = false;

    protected $fillable = [
        'nomePessoa',
        'apelido',
        'cpf_cnpj',
        'dataNascimento',
        'saldo',
        'status'
    ];

    protected $casts = [
        'dataNascimento' => 'date',
        'saldo' => 'decimal:2',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'idPessoa');
    }

    public function telefones(): HasMany
    {
        return $this->hasMany(Telefone::class, 'idPessoa');
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class, 'idPessoa');
    }

    public function hospedagens(): HasMany
    {
        return $this->hasMany(Hospedagem::class, 'idPessoa');
    }
} 