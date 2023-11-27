<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Requisicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_requisicion';
    protected $table = 'requisiciones';
    protected $fillable = [
        'dependencia_id_dependencia',
        'area_id_area',
        'fecha_elaboracion',
        'no_requesicion',
        'fecha_requerida',
        'lugar_entrega',
        'otros_gravamientos',
        'total',
        'anexos',
        'aticipos',
        'autorizacion_presupuesto',
        'existencia_almacen',
        'observaciones',
        'registro_sanitario',
        'normas',
        'capacitacion',
        'pais_id_pais',
        'metodos_id_metodos',
        'garantia_id_garantia',
        'porcentaje',
        'pluralidad',
        'penas_convencionales',
        'tiempo_fabricacion',
        'condicion_id_condicion',
        'solicita',
        'autoriza',
        'estado',
    ];
    public function detalles()
    {
        return $this->hasMany(DetalleRequesicion::class, 'requisicion_id');
    }
    public function archivo()
    {
        return $this->hasMany(ArchivosRequisicion::class);
    }

    public function dependenciarequesicion(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_dependencia','dependencia_id_dependencia' );
    }
    public function arearequesicion(): HasOne
    {
        return $this->hasOne(Area::class, 'id_area','area_id_area' );
    }
    public function metodosrequesicion(): HasOne
    {
        return $this->hasOne(Metodo::class, 'id_metodos','metodos_id_metodos' );
    }
    public function garantiarequesicion(): HasOne
    {
        return $this->hasOne(Garantia::class, 'id_garantia','garantia_id_garantia' );
    }
    public function condicionrequesicion(): HasOne
    {
        return $this->hasOne(Condicion::class, 'id_condicion','condicion_id_condicion' );
    }
    public function estadorequisicion(): HasOne
    {
        return $this->hasOne(Estado::class, 'id_estado','estado' );
    }
    
}
