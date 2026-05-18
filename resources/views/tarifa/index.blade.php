@extends('plantilla')

@section('titulo', 'Gestión de tarifas')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('tarifa.create')}}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if ($tarifa->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-wallet2 mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay tarifas disponibles</p>
                    <small>
                        Actualmente no hay tarifas registradas
                    </small>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body d-none d-lg-block">
                <table class="table table-striped table-hover border" id="taula">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Precio Día</th>
                            <th>Precio Kilovatio</th>
                            <th>KWh Gratuitos</th>
                            <th>Limite Watts</th>
                            <th>Limite Amperios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarifa as $t)
                            <tr>
                                <td class="align-middle">{{ $t->id }}</td>
                                <td class="align-middle">{{ $t->nombre }}</td>
                                <td class="align-middle">{{ $t->tipo }}</td>
                                <td class="align-middle">{{ $t->precio_dia ?? 'N/A' }}</td>
                                <td class="align-middle">{{ $t->precio_kilovatio ?? 'N/A' }}</td>
                                <td class="align-middle">{{ $t->kwh_gratuitos ?? 'N/A' }}</td>
                                <td class="align-middle">{{ $t->limite_watts }}</td>
                                <td class="align-middle">{{ $t->limite_amperios }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{route('tarifa.edit', $t)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{route('tarifa.destroy', $t)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($parcela as $p)
                    <div class="card my-3">
                        <div class="card-header"><span class="">{{ $p->nombre }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $p->id }}</p>
                            <p><span class="fw-bold">Nombre : </span> {{ $p->nombre }}</p>
                            <p><span class="fw-bold">Dispositivo Shelly : </span> {{ $p->shelly }}</p>
                            <p><span class="fw-bold">Canal : </span> {{ $p->canal }}
                            <p><span class="fw-bold">Shelly_on : </span>
                                @if($p->shelly_on)
                                    <span class="badge text-bg-success">Encendido</span>
                                @else
                                    <span class="badge text-bg-secondary">Apagado</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex gap-2">
                                <a href="{{route('tarifa.show', $p)}}" class="btn btn-primary btn-3d fs-6 p-2">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{route('tarifa.edit', $p)}}" class="btn btn-warning btn-3d fs-6 p-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('tarifa.destroy', $p)}}" class="btn btn-danger btn-3d fs-6 p-2">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer">
                {{ $tarifa->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endif
@endsection
