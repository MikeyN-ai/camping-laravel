@extends('plantilla')

@section('titulo', 'Gestión de checkins')


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
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                        <th>Parcela</th>
                        <th>Cliente</th>
                        <th>Tarifa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkin as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->fecha_entrada }}</td>
                            <td>{{ $c->fecha_salida }}</td>
                            <td>{{ $c->parcela->nombre }}</td>
                            <td>{{ $c->cliente->nombre }}</td>
                            <td>{{ $c->tarifa->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $checkin->links('vendor.pagination.custom') }}
        </div>
    </div>

@endsection
