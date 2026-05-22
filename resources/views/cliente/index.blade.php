@extends('plantilla')

@section('titulo', 'Gestión de clientes')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{ route('cliente.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if (session('success') || session('error'))
        <div id="liveToast" class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show shadow" role="alert">
            {{ session('success') || session('error') }}
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

    @if ($cliente->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-person-badge mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay clientes disponibles</p>
                    <small>
                        Actualmente no hay clientes registrados
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
                            <th>Correo</th>
                            <th>NIF</th>
                            <th>Teléfono</th>
                            <th>Matrícula</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente as $c)
                            <tr>
                                <td class="align-middle">{{ $c->id }}</td>
                                <td class="align-middle">{{ $c->nombre . ' ' . $c->apellidos }}</td>
                                <td class="align-middle">{{ $c->correo }}</td>
                                <td class="align-middle">{{ $c->nif }}</td>
                                <td class="align-middle">{{ $c->telefono }}</td>
                                <td class="align-middle">{{ $c->matricula }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('cliente.edit', $c) }}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" data-nombre="{{ $c->nombre . ' ' . $c->apellidos }}"
                                        data-ruta="{{ route('cliente.destroy', $c) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($cliente as $c)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $c->nombre . ' ' . $c->apellidos }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $c->id }}</p>
                            <p><span class="fw-bold">Nombre : </span> {{ $c->nombre . ' ' . $c->apellidos }}</p>
                            <p><span class="fw-bold">Correo : </span> {{ $c->correo }}</p>
                            <p><span class="fw-bold">NIF : </span> {{ $c->nif }}</p>
                            <p><span class="fw-bold">Teléfono : </span> {{ $c->telefono }}</p>
                            <p><span class="fw-bold">Matrícula : </span> {{ $c->matricula }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <div class="d-flex gap-2">
                                <a href="{{ route('cliente.edit', $c) }}" class="btn btn-warning btn-3d fs-6 p-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete" data-nombre="{{ $c->nombre . ' ' . $c->apellidos }}"
                                    data-ruta="{{ route('cliente.destroy', $c) }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $cliente->links('vendor.pagination.custom') }}
            </div>
        </div>
        <!-- Modal eliminar -->
        <x-modal-delete />
    @endif
@endsection
