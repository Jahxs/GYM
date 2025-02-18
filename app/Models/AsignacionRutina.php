<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsignacionRutina extends Model
{
    protected $table = 'asignacion_rutinas';
    protected $primaryKey = 'id_asignacion';
    
    protected $fillable = [
        'id_rutina',
        'id_usuario',
        'fecha_asignacion',
        'dia_semana'
    ];

    protected $casts = [
        'fecha_asignacion' => 'date'
    ];

    public function rutina(): BelongsTo
    {
        return $this->belongsTo(RutinaPredefinida::class, 'id_rutina', 'id_rutina');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
} 