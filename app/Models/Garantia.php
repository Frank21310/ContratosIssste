<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_garantia';
    protected $table = 'garantias';
    protected $fillable = [
        'nombre_garantia',
    ];
}
