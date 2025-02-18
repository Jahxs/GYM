<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodoPago extends Model
{
    protected $table = 'metodos_pago';
    protected $primaryKey = 'id_metodo_pago';
    
    protected $fillable = [
        'nombre_metodo',
        'descripcion',
        'activo'
    ];

    public function getRouteKeyName()
    {
        return 'id_metodo_pago';
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'id_metodo_pago');
    }

    public function puedeSerEliminado(): bool
    {
        return $this->pagos()->count() === 0;
    }
} 