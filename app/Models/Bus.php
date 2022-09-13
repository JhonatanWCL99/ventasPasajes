<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';

    protected $fillable = ['marca','cantidad_max_asientos','modelo','placa','estado'];

    public function viajes(){
        return $this->hasMany(Viaje::class);

    }

    public function asientos(){
        return $this->hasMany(Asiento::class);
    }

}
