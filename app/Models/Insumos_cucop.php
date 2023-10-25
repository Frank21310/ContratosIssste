<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Insumos_cucop extends Model
{
    use HasFactory;
    protected $primaryKey = 'clave_cucop';
    protected $table = 'insumos_cucop';
    protected $fillable = [
        'id_partida_especifica_id',
        'descripcion_insumo',
        'CABM',
        'tipo_contratacion',
    ];
    public function PartidaInsumo(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_partida_especifica','id_partida_especifica_id' );
    }
}
