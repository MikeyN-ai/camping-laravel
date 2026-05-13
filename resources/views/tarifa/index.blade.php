@extends('plantilla')

@section('titulo', 'Gestión de tarifas')

@section('contenido')
    <div class="text-end p-3">
        <a href="{{route('tarifa.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                            <td class="d-flex gap-2">
                                <a href="{{route('tarifa.edit', $t)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('tarifa.destroy', $t)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
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
