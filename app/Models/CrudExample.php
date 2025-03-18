<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudExample extends Model
{
    protected $table = 'crudexample'; // Table name in the database

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

    // Disable timestamps if there are no created_at and updated_at columns
    public $timestamps = false;
}
