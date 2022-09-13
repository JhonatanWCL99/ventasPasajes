<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    use HasFactory;

    protected $table = 'asientos';

    protected $fillable = ['color','estado','bus_id'];

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
