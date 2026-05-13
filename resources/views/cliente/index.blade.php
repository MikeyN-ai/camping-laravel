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
                            <td class="align-middle">{{ $c->nombre . " " . $c->apellidos }}</td>
                            <td class="align-middle">{{ $c->correo }}</td>
                            <td class="align-middle">{{ $c->nif }}</td>
                            <td class="align-middle">{{ $c->telefono }}</td>
                            <td class="align-middle">{{ $c->matricula }}</td>
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
