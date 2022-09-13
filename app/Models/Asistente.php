<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viaje;

class Asistente extends Model
{
    use HasFactory;
    protected $table = 'asistentes';

    protected $fillable = ['cargo','persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function viajes(){
        return $this->belongsToMany(Viaje::class);
    }
}
