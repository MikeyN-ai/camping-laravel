<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camping extends Model
{
    // Un camping tiene muchas tarifas
    public function tarifas()
    {
        return $this->hasMany('App\Models\Tarifa:class');
    }

    // El camping tiene muchos usuarios
    public function user()
    {
        return $this->hasMany('App\Models\User::class');
    }

    // Unir con cliente
}
