<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Laravel\Ui\Presets\React;

class DetalleRequesicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detallerequisiciones';
    protected $fillable = [
        'requisicion_id',
        'num_partida',
        'cucop',
        'descripcion',
        'cantidad',
        'unidad_medida',
        'precio',
        'importe',
    ];
    
    public function requisicion()
    {
        return $this->belongsTo(Requesicion::class, 'requisicion_id');
    }

    
    public function CucopsDetalle(): HasOne
    {
        return $this->hasOne(Cucops::class, 'id_cucop', 'cucop');
    }
    public function UnidadMedida(): HasOne
    {
        return $this->hasOne(Cucops::class, 'idunidad_medida', 'unidad_medida');
    }
}
