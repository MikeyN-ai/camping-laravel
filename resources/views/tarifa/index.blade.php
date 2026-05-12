@extends('plantilla')

@section('titulo', 'Gestión de tarifas')

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
                        <th>Tipo</th>
                        <th>Precio Día</th>
                        <th>Precio Kilovatio</th>
                        <th>KWh Gratuitos</th>
                        <th>Limite Watts</th>
                        <th>Limite Amperios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarifa as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->nombre }}</td>
                            <td>{{ $t->tipo }}</td>
                            <td>{{ $t->precio_dia ?? 'N/A' }}</td>
                            <td>{{ $t->precio_kilovatio ?? 'N/A' }}</td>
                            <td>{{ $t->kwh_gratuitos ?? 'N/A' }}</td>
                            <td>{{ $t->limite_watts }}</td>
                            <td>{{ $t->limite_amperios }}</td>
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $tarifa->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
