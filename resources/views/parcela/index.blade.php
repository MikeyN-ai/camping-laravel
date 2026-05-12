@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

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
                        <th>Shelly</th>
                        <th>Canal</th>
                        <th>Shelly_on</th>
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
