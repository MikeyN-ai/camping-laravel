@extends('plantilla')

@section('titulo', 'Gestión de usuarios')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{ route('usuario.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

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
        <div class="card mb-4">
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
                                <td class="align-middle">{{ $u->camping->nombre }}</td>
                                <td class="align-middle">{{ $u->idioma->idioma }}</td>
                                <td class="align-middle">{{ $u->rol }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('usuario.edit', $u) }}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('usuario.destroy', $u) }}" class="btn btn-danger fs-6 p-2 btn-3d">
                                        <i class="bi bi-trash"></i>
                                    </a>
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
                            <p><span class="fw-bold">Camping : </span> {{ $u->camping->nombre }}</p>
                            <p><span class="fw-bold">Idioma : </span> {{ $u->idioma->idioma }}</p>
                            <p><span class="fw-bold">Rol : </span> {{ $u->rol }}</p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="{{ route('usuario.edit', $u) }}" class="btn btn-warning btn-3d fs-6 p-2">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ route('usuario.destroy', $u) }}" class="btn btn-danger btn-3d fs-6 p-2">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $usuario->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endif
@endsection
