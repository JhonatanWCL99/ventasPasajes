<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $fillable = ['lugar_origen','lugar_llegada','viaje_id','ciudad_id'];

    public function viaje(){
        return $this->belongsTo(Viaje::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
