<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'tblUsuario';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa',
        'login',
        'senha',
        'idPermissao',
        'status'
    ];

    protected $hidden = [
        'senha'
    ];

    protected $casts = [
        'status' => 'integer',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }

    public function permissao(): BelongsTo
    {
        return $this->belongsTo(Permissao::class, 'idPermissao');
    }

    public function vendas(): HasMany
    {
        return $this->hasMany(Venda::class, 'idUsuario');
    }

    public function hospedagens(): HasMany
    {
        return $this->hasMany(Hospedagem::class, 'idUsuario');
    }

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
} 