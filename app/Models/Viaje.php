<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $table = 'viajes';
    protected $fillable = [
        'fecha_salida',
        'hora_salida',
        'estado',
        'precio_asiento',
        'chofer_id',
        'bus_id',
        'ruta_id'
    ];

    /* Relacion N a M */
    public function asistentes()
    {
        return $this->belongsToMany(Asistente::class);
    }

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }


    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    public function detalles_ventas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
