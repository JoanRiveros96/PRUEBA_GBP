<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bodegas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
'id_responsable',
'estado',
'created_by',
'updated_by',
    ];

    public $timestamps = true;
}
