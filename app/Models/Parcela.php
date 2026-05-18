<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'shelly',
        'id_camping',
        'canal',
        'shelly_on',
    ];

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
