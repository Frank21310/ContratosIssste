<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Ui\Presets\React;

class DetalleRequesicion extends Model
{
    use HasFactory;
    protected $table = 'detallerequesiciones';
    protected $fillable = [
        'requesicion_id_requesicion',
        'num_partida',
        'cucop',
        'descripcion',
        'cantidad',
        'unidad_medida',
        'precio',
        'importe',
    ];
    public function RequesecionDetalle(): HasOne
    {
        return $this->hasOne(Requesicion::class, 'id_requesicion','requesicion_id_requesicion' );
    }
    public function CucopsDetalle(): HasOne
    {
        return $this->hasOne(Cucops::class, 'id_cucop','cucop' );
    }

}
