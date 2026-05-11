<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarifa extends Model
{
    use HasFactory;

    // Una tarifa pertenece a un camping
    public function camping()
    {
        return $this->belongsTo(Camping::class, 'id_camping');
    }

    // Una tarifa puede tener muchos checkins
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'id_tarifa');
    }
}
