<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulos_cucop extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_capitulo';
    protected $table = 'capitulos_cucop';
    protected $fillable = [
        'nombre_capitulo',
    ];
}
