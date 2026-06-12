@extends('plantilla')

@section('titulo', 'Gestión de tarifas')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{ route('tarifa.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if (session('success') || session('error'))
        <div id="liveToast" class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show shadow" role="alert">
            {{ session('success') ? session('success') : session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('liveToast');
                if (el) {
                    new bootstrap.Alert(el).close();
                }
            }, 5000);
        </script>
    @endif

    @if (session('error-borrar'))
        <x-modal-error-borrar :tablas="session('error-borrar')" />
    @endif

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
        <div class="card mb-4 shadow">
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
                                    <a href="{{ route('tarifa.edit', $t) }}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" data-nombre="{{ $t->nombre }}"
                                        data-ruta="{{ route('tarifa.destroy', $t) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($tarifa as $t)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $t->nombre }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $t->id }}</p>
                            <p><span class="fw-bold">Nombre : </span> {{ $t->nombre }}</p>
                            <p><span class="fw-bold">Tipo : </span> {{ $t->tipo }}</p>
                            <p><span class="fw-bold">Precio Día : </span> {{ $t->precio_dia ?? 'N/A' }}</p>
                            <p><span class="fw-bold">Precio Kilovatio : </span> {{ $t->precio_kilovatio ?? 'N/A' }}</p>
                            <p><span class="fw-bold">KWh Gratuitos : </span> {{ $t->kwh_gratuitos ?? 'N/A' }}</p>
                            <p><span class="fw-bold">Limite Watts : </span> {{ $t->limite_watts }}</p>
                            <p><span class="fw-bold">Limite Amperios : </span> {{ $t->limite_amperios }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="{{ route('tarifa.edit', $t) }}" class="btn-custom btn-editar fs-6 p-2 btn-3d">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                data-bs-target="#modalDelete" data-nombre="{{ $t->nombre }}"
                                data-ruta="{{ route('tarifa.destroy', $t) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $tarifa->links('vendor.pagination.custom') }}
            </div>
        </div>
        <!-- Modal eliminar -->
        <x-modal-delete />
    @endif
@endsection
