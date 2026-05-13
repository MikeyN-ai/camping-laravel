@extends('plantilla')

@section('titulo', 'Gestión de clientes')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('cliente.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nombre . " " . $c->apellidos }}</td>
                            <td>{{ $c->correo }}</td>
                            <td>{{ $c->nif }}</td>
                            <td>{{ $c->telefono }}</td>
                            <td>{{ $c->matricula }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('cliente.edit', $c)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('cliente.destroy', $c)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $cliente->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
