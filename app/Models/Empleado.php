<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Attributes\Depends;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'num_empleado';
    protected $table = 'empleados';
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'cargo_id_cargo',
        'dependencia_id_dependencia',
    ];
    public function permisorol(): BelongsTo
    {
        return $this->belongsTo(Permisos::class, 'permiso_id_permisos', 'id_permisos');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id_cargo', 'id_cargo');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id_dependencia', 'id_dependencia');
    }
}
