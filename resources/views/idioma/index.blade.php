@extends('plantilla')

@section('titulo', 'Gestión de idiomas')

@section('contenido')
    @if (isAdmin())
        <div class="text-end p-3">
            <a href="{{ route('idioma.create') }}" class="btn btn-dark btn-lg border btn-3d">
                <i class="bi bi-plus-circle pe-1"></i>
                Crear
            </a>
        </div>
    @else
        <div class="pt-5"></div>
    @endif

    @if (session('success') || session('error'))
        <div id="liveToast"
            class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show shadow"
            role="alert">
            {{ session('success') || session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('liveToast');
                if (el) {
                    new bootstrap.Alert(el).close();
                }
            }, 5000);
        </script>
    @endif

    @if (session('error-borrar'))
        <x-modal-error-borrar :tablas="session('error-borrar')" />
    @endif

    @if ($idioma->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-translate mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay idiomas disponibles</p>
                    <small>
                        Actualmente no hay idiomas registrados
                    </small>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-4 shadow">
            <div class="card-body d-none d-lg-block">
                <table class="table table-striped table-hover border" id="taula">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Idioma</th>
                            <th>Abreviatura</th>
                            @if (isAdmin())
                            <th>Acciones</th> @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($idioma as $i)
                            <tr>
                                <td class="align-middle">{{ $i->id }}</td>
                                <td class="align-middle">{{ $i->idioma }}</td>
                                <td class="align-middle">{{ $i->abreviatura }}</td>
                                @if (isAdmin())
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('idioma.edit', $i) }}" class="btn btn-warning fs-6 p-2 btn-3d">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete" data-nombre="{{ $i->idioma }}"
                                            data-ruta="{{ route('idioma.destroy', $i) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($idioma as $i)
                    <div class="card my-3">
                        <div class="card-header"><span class="">{{ $i->idioma }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $i->id }}</p>
                            <p><span class="fw-bold">Idioma : </span> {{ $i->idioma }}</p>
                            <p><span class="fw-bold">Abreviatura : </span> {{ $i->abreviatura }}</p>
                        </div>
                        @if (isAdmin())
                            <div class="card-footer d-flex gap-2 justify-content-end">
                                <a href="{{ route('idioma.edit', $i) }}" class="btn btn-warning btn-3d fs-6 p-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                    data-nombre="{{ $i->idioma }}" data-ruta="{{ route('idioma.destroy', $i) }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $idioma->links('vendor.pagination.custom') }}
            </div>

            <!-- Modal eliminar -->
            <x-modal-delete />
        </div>
    @endif
@endsection
