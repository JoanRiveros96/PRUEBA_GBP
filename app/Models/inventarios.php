<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventarios extends Model
{
    use HasFactory;

    protected $fillable = [
        
'id_bodega',
'id_producto',
'cantidad',
'created_by',
'updated_by',
    ];

    public $timestamps = true;
}
