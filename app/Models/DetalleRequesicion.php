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
        return $this->belongsTo(Requisicion::class, 'requisicion_id');
    }
    public function partidas()
    {
        return $this->belongsTo(Partidas_cucop::class, 'num_partida');
    }
    
    public function insumo()
    {
        return $this->belongsTo(Insumos_cucop::class, 'cucop');
    }
    public function UnidadMedida()
    {
        return $this->belongsTo(Unidad_medida::class, 'unidad_medida');
    }
}
