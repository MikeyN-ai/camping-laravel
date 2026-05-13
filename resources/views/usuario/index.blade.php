@extends('plantilla')

@section('titulo', 'Gestión de usuarios')

@section('contenido')
    <div class="text-end p-3">
        <a href="{{route('usuario.create')}}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Camping</th>
                        <th>Idioma</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->usuario }}</td>
                            <td>{{ $u->camping->nombre }}</td>
                            <td>{{ $u->idioma->idioma }}</td>
                            <td>{{ $u->rol }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('usuario.edit', $u)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('usuario.destroy', $u)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $usuario->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
