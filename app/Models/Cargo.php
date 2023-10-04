<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cargo';
    protected $table = 'cargos';
    protected $fillable = [
        'nombre_cargo',
    ];
}
