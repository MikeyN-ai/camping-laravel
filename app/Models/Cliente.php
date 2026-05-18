<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'nif',
        'telefono',
        'id_camping',
        'matricula',
    ];

    // Un cliente pertenece a un camping
    public function camping()
    {
        return $this->belongsTo(Camping::class, 'id_camping');
    }

    // Un cliente puede tener muchos checkins
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'id_cliente');
    }
}
