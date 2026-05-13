@extends('plantilla')

@section('titulo', 'Gestión de check-in')


@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('checkin.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                        <th>Parcela</th>
                        <th>Cliente</th>
                        <th>Tarifa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkin as $c)
                        <tr>
                            <td class="align-middle">{{ $c->id }}</td>
                            <td class="align-middle">{{ $c->fecha_entrada }}</td>
                            <td class="align-middle">{{ $c->fecha_salida }}</td>
                            <td class="align-middle">{{ $c->parcela->nombre }}</td>
                            <td class="align-middle">{{ $c->cliente->nombre }}</td>
                            <td class="align-middle">{{ $c->tarifa->nombre }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('checkin.edit', $c)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('checkin.destroy', $c)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
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
