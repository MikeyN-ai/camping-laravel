@extends('plantilla')

@section('titulo', 'Gestión de clientes')

@section('contenido')

    <div class="container-fluid p-0 pt-1">
        <form action="{{ route('cliente.index') }}" method="GET" class="rounded bg-white border shadow mt-4 pt-3 mb-1">
            <div class="row mx-2">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputNombre"
                            aria-describedby="nombreHelp" placeholder="Filtrar por nombre..." maxlength="100" name="nombre"
                            value="{{ request('nombre') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputCorreo"
                            aria-describedby="correoHelp" placeholder="Filtrar por correo..." maxlength="200" name="correo"
                            value="{{ request('correo') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputNif" class="form-label">NIF</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputNif"
                            aria-describedby="nifHelp" placeholder="Filtrar por NIF..." maxlength="100" name="nif"
                            value="{{ request('nif') }}" />
                    </div>
                </div>
            </div>
            <div class="row mx-2">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputTelefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputTelefono"
                            aria-describedby="telefonoHelp" placeholder="Filtrar por teléfono..." maxlength="100" name="telefono"
                            value="{{ request('telefono') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputMatricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputMatricula"
                            aria-describedby="matriculaHelp" placeholder="Filtrar por matrícula..." maxlength="100" name="matricula"
                            value="{{ request('matricula') }}" />
                    </div>
                </div>
            </div>
            <div class="row px-2">
                <div class="col-12 px-4 pb-3">
                    <div class="d-grid gap-2 mx-auto d-md-flex justify-content-md-end">
                        <button type="submit" class="btn-custom btn-filtrar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-funnel pe-1" alt="Filtrar"></i>
                            Filtrar
                        </button>
                        <a href="{{ route('cliente.index') }}" class="btn-custom btn-limpiar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-trash pe-1" alt="Limpiar"></i>
                            Limpiar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="text-end p-3">
        <a href="{{ route('cliente.create') }}" class="btn btn-dark btn-lg border btn-3d">
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
                                    <a href="{{ route('cliente.edit', $c) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
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
                                <a href="{{ route('cliente.edit', $c) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
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
