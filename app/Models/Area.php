<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Area extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_area';
    protected $table = 'areas';
    protected $fillable = [
        'nombre_area',
        'dependencia_id_dependencia',
    ];
    public function DependenciaArea(): HasOne
    {
        return $this->hasOne(Dependencia::class, 'id_dependencia','dependencia_id_dependencia' );
    }
}
