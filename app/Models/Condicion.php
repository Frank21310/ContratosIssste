<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_condicion';
    protected $table = 'condiciones';
    protected $fillable = [
        'nombre_condicion',
    ];
}
