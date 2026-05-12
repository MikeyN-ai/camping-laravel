@extends('plantilla')

@section('titulo', 'Gestión de clientes')

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
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>NIF</th>
                        <th>Teléfono</th>
                        <th>Matrícula</th>
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
