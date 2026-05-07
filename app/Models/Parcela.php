<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    // Una parcela pertenece a un camping
    public function camping()
    {
        return $this->belongsTo(Camping::class, 'id_camping');
    }

    // Una parcela puede tener muchos checkins
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'id_parcela');
    }
}
