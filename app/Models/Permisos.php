<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_permisos';
    protected $table = 'permisos';
    protected $fillable = [
        'nombre_permiso',
    ];
}
