@extends('plantilla')

@section('titulo', 'Gestión de usuarios')

@section('contenido')

    <div class="container-fluid p-0 pt-1">
        <form action="{{ route('usuario.index') }}" method="GET" class="rounded bg-white border shadow mt-4 pt-3 mb-1">
            <div class="row mx-2">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputUsuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputUsuario"
                            aria-describedby="usuarioHelp" placeholder="Filtrar por usuario..." maxlength="100"
                            name="usuario" value="{{ request('usuario') }}" />
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
                        <label for="inputCamping" class="form-label">Camping</label>
                        <select class="form-select border border-dark-subtle" id="inputCamping" name="id_camping">
                            <option value="">Todos</option>
                            @foreach ($camping as $c)
                                <option value="{{ $c->id }}" {{ request('id_camping') == $c->id ? 'selected' : '' }}>
                                    {{ $c->nombre }}
                                </option>
                            @endforeach
                        </select>
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
                        <a href="{{ route('usuario.index') }}" class="btn-custom btn-limpiar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-trash pe-1" alt="Limpiar"></i>
                            Limpiar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="text-end p-3">
        <a href="{{ route('usuario.create') }}" class="btn btn-dark btn-lg border btn-3d">
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

    @if ($usuario->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-people mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay usuarios disponibles</p>
                    <small>
                        Actualmente no hay usuarios registrados
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
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Camping</th>
                            <th>Idioma</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $u)
                            <tr>
                                <td class="align-middle">{{ $u->id }}</td>
                                <td class="align-middle">{{ $u->usuario }}</td>
                                <td class="align-middle">{{ $u->correo }}</td>
                                <td class="align-middle">{{ $u->camping->nombre ?? 'N/A' }}</td>
                                <td class="align-middle">{{ $u->idioma->idioma }}</td>
                                <td class="align-middle">{{ $u->rol }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('usuario.edit', $u) }}"
                                            class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete" data-nombre="{{ $u->usuario }}"
                                            data-ruta="{{ route('usuario.destroy', $u) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($usuario as $u)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $u->usuario }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $u->id }}</p>
                            <p><span class="fw-bold">Usuario : </span> {{ $u->usuario }}</p>
                            <p><span class="fw-bold">Correo : </span> {{ $u->correo }}</p>
                            <p><span class="fw-bold">Camping : </span> {{ $u->camping->nombre ?? 'N/A' }}</p>
                            <p><span class="fw-bold">Idioma : </span> {{ $u->idioma->idioma }}</p>
                            <p><span class="fw-bold">Rol : </span> {{ $u->rol }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="{{ route('usuario.edit', $u) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                data-bs-target="#modalDelete" data-nombre="{{ $u->usuario }}"
                                data-ruta="{{ route('usuario.destroy', $u) }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $usuario->links('vendor.pagination.custom') }}
            </div>
        </div>
        <!-- Modal eliminar -->
        <x-modal-delete />
    @endif
@endsection
