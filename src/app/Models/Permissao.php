<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permissao extends Model
{
    protected $table = 'tblPermissao';
    public $timestamps = false;

    protected $fillable = [
        'modulos'
    ];

    protected $casts = [
        'modulos' => 'array',
        'dataCadastro' => 'datetime',
        'dataAtualizacao' => 'datetime'
    ];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'idPermissao');
    }
} 