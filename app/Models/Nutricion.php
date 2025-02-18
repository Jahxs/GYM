<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nutricion extends Model
{
    protected $table = 'nutricion';
    protected $primaryKey = 'id_nutricion';
    
    protected $fillable = [
        'id_usuario',
        'informacion',
        'plan_dieta',
        'fecha_asignacion'
    ];

    protected $casts = [
        'fecha_asignacion' => 'date'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
} 