<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RutinaPredefinida extends Model
{
    protected $table = 'rutinas_predefinidas';
    protected $primaryKey = 'id_rutina';
    
    protected $fillable = [
        'nombre_rutina',
        'descripcion',
        'objetivo',
        'estado',
        'id_usuario'
    ];

    protected $casts = [
        'estado' => 'string'
    ];

    public function entrenador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function getRouteKeyName()
    {
        return 'id_rutina';
    }
} 