<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rol extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rol';
    protected $table = 'rols';
    protected $fillable = [
        'nombre_rol',
        'permiso_id_permisos',

    ];
    public function permisorol(): BelongsTo
    {
        return $this->belongsTo(Permisos::class, 'permiso_id_permisos', 'id_permisos');
    }
}
