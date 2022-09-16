<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalles_venta';

    protected $fillable = [
        'cantidad',
        'subtotal',
        'viaje_id',
        'venta_id',
    ];


    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }
}
