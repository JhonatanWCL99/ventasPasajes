<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = ['nombre','apellido','ci','fecha_nacimiento','direccion','genero'];

    public function choferes(){
        return $this->hasOne(Chofer::class);
    }

    public function asistentes(){
        return $this->hasOne(Asistente::class);
    }

    public function pasajeros(){
        return $this->hasOne(Pasajero::class);
    }
}
