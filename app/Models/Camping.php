<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camping extends Model
{
    use HasFactory;

    // Un camping tiene muchas tarifas
    public function tarifas()
    {
        return $this->hasMany(Tarifa::class);
    }

    // El camping tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_camping');
    }

    // Un camping tiene muchos clientes
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_camping');
    }

    // Un camping tiene muchas parcelas
    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'id_camping');
    }
}
