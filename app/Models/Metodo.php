<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_metodos';
    protected $table = 'metodos';
    protected $fillable = [
        'nombre_metodos',
    ];
}
