@extends('plantilla')

@section('titulo', 'Gestión de check-in')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('checkin.create')}}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>
    @if ($checkin->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard2-check mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay check-ins disponibles</p>
                    <small>
                        Actualmente no hay check-ins registrados
                    </small>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-4">
            <div class="card-body d-none d-lg-block">
                <table class="table table-striped table-hover border" id="taula">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Parcela</th>
                            <th>Cliente</th>
                            <th>Tarifa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkin as $c)
                            <tr>
                                <td class="align-middle">{{ $c->id }}</td>
                                <td class="align-middle">{{ fechaCorta($c->fecha_entrada) }}</td>
                                <td class="align-middle">{{ fechaCorta($c->fecha_salida) }}</td>
                                <td class="align-middle">{{ $c->parcela->nombre }}</td>
                                <td class="align-middle">{{ $c->cliente->nombre }}</td>
                                <td class="align-middle">{{ $c->tarifa->nombre }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{route('checkin.edit', $c)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{route('checkin.destroy', $c)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
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
                            <p><span class="fw-bold">Fecha Entrada : </span> {{ fechaCorta($c->fecha_entrada) }}</p>
                            <p><span class="fw-bold">Fecha Salida : </span> {{ fechaCorta($c->fecha_salida) }}</p>
                            <p><span class="fw-bold">Parcela : </span> {{ $c->parcela->nombre }}</p>
                            <p><span class="fw-bold">Cliente : </span> {{ $c->cliente->nombre }}</p>
                            <p><span class="fw-bold">Tarifa : </span> {{ $c->tarifa->nombre }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <div class="d-flex gap-2">
                                <a href="{{route('checkin.edit', $c)}}" class="btn btn-warning btn-3d fs-6 p-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('checkin.destroy', $c)}}" class="btn btn-danger btn-3d fs-6 p-2">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
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
