<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    use HasFactory;

    protected $fillable = [
        'idioma',
        'abreviatura',
    ];

    // Un idioma lo pueden tener muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_idioma');
    }
}
