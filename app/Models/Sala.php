<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //Permitimos que se puedan guardar estos campos de forma masiva
    protected $fillable = ['nombre', 'capacidad'];
    public $timestamps = false;

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}


