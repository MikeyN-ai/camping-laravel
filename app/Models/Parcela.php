<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcela extends Model
{
    use HasFactory;

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
