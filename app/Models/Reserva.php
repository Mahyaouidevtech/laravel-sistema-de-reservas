<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'sala_id',
        'cliente',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación: Una reserva pertenece a una Sala
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
