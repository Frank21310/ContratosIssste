<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    public function dependenciaempleado(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_dependencia','dependencia_id_dependencia' );
    }
}
