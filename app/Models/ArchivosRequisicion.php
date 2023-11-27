<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivosRequisicion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'archivosrequisicion';
    protected $fillable = [
        'requisicion_id',
        'name',
        'image_path',
    ];
    
    public function requisicionarchivo()
    {
        return $this->belongsTo(Requisicion::class);
    }
}
