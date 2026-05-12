@extends('plantilla')

@section('titulo', 'Gestión de campings')

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
                        <th>Dirección</th>
                        <th>Persona de Contacto</th>
                        <th>Teléfono de Contacto</th>
                        <th>Correo de Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($camping as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->direccion }}</td>
                            <td>{{ $c->persona_contacto }}</td>
                            <td>{{ $c->telefono_contacto }}</td>
                            <td>{{ $c->correo_contacto }}</td>
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
