<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'choferes';
    protected $fillable = ['licencia_conducir','fecha_caducidad','estado','persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function viajes(){
        return $this->hasMany(Viaje::class);
    }


}
