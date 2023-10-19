<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_medida extends Model
{
    use HasFactory;
    protected $primaryKey = 'idunidad_medida';
    protected $table = 'unidad_medida';
    protected $fillable = [
        'descripcion_unidad',
    ];
}
