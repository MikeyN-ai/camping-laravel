@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

@section('contenido')
    <div class="text-end p-3">
        <a href="{{route('parcela.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                        <th>Shelly</th>
                        <th>Canal</th>
                        <th>Shelly_on</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parcela as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->shelly }}</td>
                            <td>{{ $p->canal }}</td>
                            <td>{{ $p->shelly_on }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('tarifa.show', $p)}}" class="btn btn-primary btn-3d fs-6 p-2">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{route('tarifa.edit', $p)}}" class="btn btn-warning btn-3d fs-6 p-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('tarifa.destroy', $p)}}" class="btn btn-danger btn-3d fs-6 p-2">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $parcela->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
