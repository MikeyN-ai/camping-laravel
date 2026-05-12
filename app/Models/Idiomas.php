<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idiomas extends Model
{
    use HasFactory;

    // Un idioma lo pueden tener muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_idioma');
    }
}
