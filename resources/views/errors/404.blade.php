@extends('plantilla_vacia')

@section('titulo', '404')

@section('contenido')
<div class="vh-100 d-flex align-items-center justify-content-center">

    <div class="text-center">
        <h1 class="display-1 fw-bold text-dark">
            404
        </h1>

        <p class="fs-3 fw-semibold">
            Página no encontrada
        </p>

        <p class="text-muted mb-4">
            La página que intentas visitar no está disponible.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('inicio') }}"
               class="btn btn-dark px-4">
                Inicio
            </a>

            <button onclick="history.back()"
                    class="btn btn-outline-dark px-4">
                Atrás
            </button>
        </div>
    </div>
</div>
@endsection
