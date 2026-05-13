@extends('plantilla')

@section('titulo', 'Gestión de idiomas')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{route('idioma.create')}}" class="btn btn-dark btn-lg border btn-3d">
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
                        <th>Idioma</th>
                        <th>Abreviatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idioma as $i)
                        <tr>
                            <td class="align-middle">{{ $i->id }}</td>
                            <td class="align-middle">{{ $i->idioma }}</td>
                            <td class="align-middle">{{ $i->abreviatura }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('idioma.edit', $i)}}" class="btn btn-warning fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{route('idioma.destroy', $i)}}" class="btn btn-danger fs-6 p-2 btn-3d">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
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
