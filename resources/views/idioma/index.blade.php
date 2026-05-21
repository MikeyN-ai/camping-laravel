@extends('plantilla')

@section('titulo', 'Gestión de idiomas')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{ route('idioma.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if (session('success'))
        <div id="liveToast" class="alert alert-success alert-dismissible fade show shadow" role="alert">
            {{ session('success') }}
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
                                    <a href="{{ route('idioma.edit', $i) }}" class="btn btn-warning fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                        data-bs-target="#modalBorrar" data-id="{{ $i->id }}"
                                        data-nombre="{{ $i->idioma }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
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
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <a href="{{ route('idioma.edit', $i) }}" class="btn btn-warning btn-3d fs-6 p-2">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <button type="button" class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                data-bs-target="#modalBorrar" data-id="{{ $i->id }}"
                                data-nombre="{{ $i->idioma }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer py-0">
                {{ $idioma->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endif

    {{-- Modal de confirmación --}}
    {{-- Modal de confirmación --}}
    <div class="modal fade" id="modalBorrar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>¿Seguro que quieres eliminar <span id="modalNombre" class="fw-bold"></span>?</p>
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-triangle-fill pe-1"></i>
                        Esta acción no se puede deshacer!
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="formBorrar" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('modalBorrar').addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget;
            document.getElementById('modalNombre').textContent = btn.getAttribute('data-nombre');
            document.getElementById('formBorrar').action = '/idioma/' + btn.getAttribute('data-id');
        });
    </script>
@endsection
