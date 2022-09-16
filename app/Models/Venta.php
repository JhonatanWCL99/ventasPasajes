<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas_pasajes';
    protected $fillable = [
        'fecha_venta',
        'hora_venta',
        'pasajero_id',
        'user_id',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }

    public function detalles_ventas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
