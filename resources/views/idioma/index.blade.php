@extends('plantilla')

@section('titulo', 'Gestión de idiomas')

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
                        <th>Idioma</th>
                        <th>Abreviatura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idioma as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->idioma }}</td>
                            <td>{{ $i->abreviatura }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $idioma->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
