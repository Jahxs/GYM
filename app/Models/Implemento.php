<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Implemento extends Model
{
    protected $table = 'implementos';
    protected $primaryKey = 'id_implemento';
    
    protected $fillable = [
        'nombre_implemento',
        'descripcion',
        'cantidad',
        'estado'
    ];

    public function getEstadoFormateadoAttribute()
    {
        return match($this->estado) {
            'operativo' => 'Operativo',
            'en_reparacion' => 'En Reparación',
            'fuera_servicio' => 'Fuera de Servicio',
            default => $this->estado,
        };
    }
} 