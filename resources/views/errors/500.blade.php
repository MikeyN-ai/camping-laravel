@extends('plantilla_vacia')

@section('titulo', '500')

@section('contenido')
<div class="vh-100 d-flex align-items-center justify-content-center">

    <div class="text-center">

        <h1 class="display-1 fw-bold text-warning">
            500
        </h1>

        <p class="fs-3 fw-semibold">
            Error interno del servidor
        </p>

        <p class="text-muted mb-4">
            Ha ocurrido un problema inesperado. Inténtalo más tarde.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('inicio') }}"
               class="btn btn-dark px-4">
                Inicio
            </a>

            <button onclick="location.reload()"
                    class="btn btn-outline-dark px-4">
                Reintentar
            </button>
        </div>

    </div>

</div>
@endsection
