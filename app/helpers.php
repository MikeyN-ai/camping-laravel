<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Función que permite comprobar si la ruta actual coincide con la que hemos enviado
 * @param mixed $ruta
 * @return string
 */
function setActivo($ruta)
{
    return request()->routeIs($ruta . '.*') ? 'seleccionado' : '';
}
/**
 * Función que permite obtener la fecha larga formateada dependiendo del idioma del usuario
 * @param mixed $fecha
 * @param mixed $idioma
 * @return string
 */
function fechaLarga($fecha, $idioma = 'es')
{
    return ucfirst(
        Carbon::parse($fecha)
            ->locale($idioma)
            ->isoFormat('LLLL')
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
/**
 * Función que permite comprobar si el usuario actual es admin
 * @return bool
 */
function isAdmin()
{
    return Auth::check() && Auth::user()?->rol === 'admin';
}
