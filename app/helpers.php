<?php

function setActivo($nombreRuta)
{
    return request()->routeIs($nombreRuta) ? 'seleccionado' : '';
}

function fechaLarga ($idioma = 'ES', $fecha)
{

    app()->setLocale(strtolower($idioma));
    return $fecha->isoFormat('LLLL');
}

function fechaCorta ($idioma = 'ES', $fecha)
{

    app()->setLocale(strtolower($idioma));
    return $fecha->isoFormat('L');
}
