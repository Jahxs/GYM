<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    protected $primaryKey = 'id_pago';
    
    protected $fillable = [
        'id_membresia',
        'id_usuario',
        'monto',
        'fecha_pago',
        'estado_pago',
        'id_metodo_pago'
    ];

    protected $casts = [
        'fecha_pago' => 'date',
        'monto' => 'decimal:2'
    ];

    public function membresia(): BelongsTo
    {
        return $this->belongsTo(Membresia::class, 'id_membresia');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class, 'id_metodo_pago');
    }

    protected static function booted()
    {
        static::saved(function ($pago) {
            if ($pago->estado_pago === 'pagado') {
                // Actualizar estado de la membresía
                $pago->membresia->update(['estado' => 'activa']);
            }
        });
    }
} 