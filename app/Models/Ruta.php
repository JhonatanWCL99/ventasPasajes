<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $fillable = ['lugar_origen','lugar_llegada','ciudad_id'];

    public function viajes(){
        return $this->hasMany(Viaje::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
