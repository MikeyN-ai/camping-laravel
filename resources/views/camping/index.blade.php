@extends('plantilla')

@section('titulo', 'Gestión de campings')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('camping.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                                <a href="{{route('camping.edit', $c)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('camping.destroy', $c)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $camping->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
