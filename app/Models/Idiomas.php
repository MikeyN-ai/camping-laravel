<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    // Un idioma lo pueden tener muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_idioma');
    }
}
