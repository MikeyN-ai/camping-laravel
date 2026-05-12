@extends('plantilla')

@section('titulo', 'Gestión de usuarios')

@section('contenido')
    <div class="text-end p-3">
        <button class="btn btn-dark btn-lg border">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </button>
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
