<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
'descripcion',
'estado',
'created_by',
'updated_by',
    ];

    public $timestamps = true;
}
