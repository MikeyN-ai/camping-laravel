@extends('plantilla')

@section('titulo', 'Reservas ' . $parcela->nombre)

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('parcela.index')}}" class="btn btn-secondary btn-lg border btn-3d">
            <i class="bi bi-arrow-90deg-left pe-1"></i>
            Volver
        </a>
    </div>

    @if ($checkin->isEmpty())
        <div class="d-flex justify-content-center mb-5">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard2-check mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay check-ins disponibles de {{ $parcela->nombre }}</p>
                    <small>
                        Actualmente no hay check-ins registrados de {{ $parcela->nombre }}
                    </small>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-4 shadow">
            <div class="card-body d-none d-lg-block">
                <table class="table table-striped table-hover border" id="taula">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Cliente</th>
                            <th>Tarifa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkin as $c)
                            <tr>
                                <td class="align-middle">{{ $c->id }}</td>
                                <td class="align-middle">{{ fechaCorta($c->fecha_entrada, auth()->user()->idioma->abreviatura) }}</td>
                                <td class="align-middle">{{ fechaCorta($c->fecha_salida, auth()->user()->idioma->abreviatura) }}</td>
                                <td class="align-middle">{{ $c->cliente->nombre }}</td>
                                <td class="align-middle">{{ $c->tarifa->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($checkin as $c)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $c->cliente->nombre }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $c->id }}</p>
                            <p><span class="fw-bold">Fecha Entrada : </span> {{ fechaCorta($c->fecha_entrada, auth()->user()->idioma->abreviatura) }}</p>
                            <p><span class="fw-bold">Fecha Salida : </span> {{ fechaCorta($c->fecha_salida, auth()->user()->idioma->abreviatura) }}</p>
                            <p><span class="fw-bold">Cliente : </span> {{ $c->cliente->nombre }}</p>
                            <p><span class="fw-bold">Tarifa : </span> {{ $c->tarifa->nombre }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $checkin->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endif
@endsection
