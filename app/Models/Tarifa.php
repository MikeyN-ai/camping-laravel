<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    // Una tarifa pertenece a un camping
    public function camping()
    {
        return $this->belongsTo('App\Models\Camping:class');
    }

    // Unir con Checkin
}
