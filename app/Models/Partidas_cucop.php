<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Partidas_cucop extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_partida_especifica';
    protected $table = 'partidas_cucop';
    protected $fillable = [
        'id_capitulo_id',
        'descripcion',
    ];
    public function CapituloPartida(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_capitulo','id_capitulo_id' );
    }
}
