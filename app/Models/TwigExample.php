<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TwigExample extends Model
{
    protected $table = 'crudexample'; // Nome da tabela no banco

    protected $fillable = [
        'name',
        'password',
        'company',
        'address',
        'phone',
        'email',
        'notes'
    ];

    protected $hidden = [
        'password',
    ];

    // Desativar timestamps se não houver colunas created_at e updated_at
    public $timestamps = false;
}

