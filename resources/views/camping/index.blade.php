@extends('plantilla')

@section('titulo', 'Gestión de camping')

@section('contenido')

    <div class="container-fluid p-0 pt-1">
        <form action="{{ route('camping.index') }}" method="GET" class="rounded bg-white border shadow mt-4 pt-3 mb-1">
            <div class="row mx-2">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputClient" class="form-label">Nombre</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputNombre"
                            aria-describedby="nombreHelp" placeholder="Filtrar per nombre ..." maxlength="100" name="nombre"
                            value="{{ request('nombre') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputTelefon" class="form-label">Teléfono</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputTelefon"
                            aria-describedby="telefonHelp" placeholder="Filtrar per teléfon ..." maxlength="100"
                            name="telefono_contacto" value="{{ request('telefono_contacto') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputCorreo"
                            aria-describedby="correoHelp" placeholder="Filtrar per correo..." maxlength="200"
                            name="correo_contacto" value="{{ request('correo_contacto') }}" />
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
                        <a href="{{ route('camping.index') }}" class="btn-custom btn-limpiar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-trash pe-1" alt="Netejar"></i>
                            Limpiar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="text-end p-3">
        <a href="{{ route('camping.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if (session('success') || session('error'))
        <div id="liveToast"
            class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show shadow"
            role="alert">
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

    @if ($camping->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-signpost-2 mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay campings disponibles</p>
                    <small class="">
                        Actualmente no hay campings registrados
                    </small>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-4 shadow shadow">
            <div class="card-body d-none d-lg-block">
                <table class="table table-striped table-hover border" id="taula">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Persona de Contacto</th>
                            <th>Teléfono de Contacto</th>
                            <th>Correo de Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($camping as $c)
                            <tr>
                                <td class="align-middle">{{ $c->id }}</td>
                                <td class="align-middle">{{ $c->nombre }}</td>
                                <td class="align-middle">{{ $c->direccion }}</td>
                                <td class="align-middle">{{ $c->persona_contacto }}</td>
                                <td class="align-middle">{{ $c->telefono_contacto }}</td>
                                <td class="align-middle">{{ $c->correo_contacto }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('camping.edit', $c) }}"
                                        class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" data-nombre="{{ $c->nombre }}"
                                        data-ruta="{{ route('camping.destroy', $c) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($camping as $c)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $c->nombre }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $c->id }}</p>
                            <p><span class="fw-bold">Nombre : </span> {{ $c->nombre }}</p>
                            <p><span class="fw-bold">Dirección : </span> {{ $c->direccion }}</p>
                            <p><span class="fw-bold">Persona de Contacto : </span> {{ $c->persona_contacto }}</p>
                            <p><span class="fw-bold">Teléfono de Contacto : </span> {{ $c->telefono_contacto }}</p>
                            <p><span class="fw-bold">Correo de Contacto : </span> {{ $c->correo_contacto }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="{{ route('camping.edit', $c) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                data-nombre="{{ $c->nombre }}" data-ruta="{{ route('camping.destroy', $c) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer py-0">
            {{ $camping->links('vendor.pagination.custom') }}
        </div>

        <!-- Modal eliminar -->
        <x-modal-delete />
    @endif
@endsection
