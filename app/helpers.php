<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Funcion que permite comprobar si la routa actual concide con la que hemos enviado
 * @param mixed $modulo
 * @return string
 */
function setActivo($modulo)
{
    return request()->routeIs($modulo . '.*') ? 'seleccionado' : '';
}
/**
 * Función que permite obtener la fecha larga formateada dependiendo del idioma del usuario
 * @param mixed $fecha
 * @param mixed $idioma
 * @return string
 */
function fechaLarga($fecha, $idioma = 'es')
{
    Carbon::setLocale($idioma);

    return ucfirst(
       Carbon::parse($fecha)->isoFormat('dddd, D [de] MMMM [de] YYYY')
    );
}
/**
 * Función que permite obtener la fecha corta formateada dependiendo del idioma del usuario
 * @param mixed $fecha
 * @param mixed $idioma
 */
function fechaCorta($fecha, $idioma = 'es')
{
    Carbon::setLocale($idioma);

    return Carbon::parse($fecha)->isoFormat('L');
}
/**
 * Función que permite saber a que camping pertenece el usuario
 * @return int|null
 */
function getCampingUsuario () {
    return auth()->user()?->camping?->id;
}
function isAdmin()
{
    return Auth::check() && Auth::user()->role === 'admin';
}
