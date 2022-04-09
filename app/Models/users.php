<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
'foto',
'estado',
'created_by',
'updated_by',
    ];

    public $timestamps = true;
}
