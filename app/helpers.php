<?php

use Carbon\Carbon;

function setActivo($modulo)
{
    return request()->routeIs($modulo . '.*') ? 'seleccionado' : '';
}

function fechaLarga($fecha, $idioma = 'es')
{
    Carbon::setLocale($idioma);

    return ucfirst(
        $fecha->isoFormat('dddd, D [de] MMMM [de] YYYY')
    );
}

function fechaCorta($fecha, $idioma = 'es')
{
    Carbon::setLocale($idioma);

    return $fecha->isoFormat('L');
}
