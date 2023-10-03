<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cucops extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cucop';
    protected $table = 'Cucops';
    protected $fillable = [
        'tipo',
        'clave_cucop',
        'partida_especifica',
        'descripcion',
        'nivel',
        'unidad_medida',

    ];
}
