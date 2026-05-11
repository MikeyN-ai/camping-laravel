<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkin extends Model
{
    use HasFactory;

    // Un checkin pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Un checkin pertenece a una parcela
    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'id_parcela');
    }

    // Un checkin pertenece a una tarifa
    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class, 'id_tarifa');
    }
}
