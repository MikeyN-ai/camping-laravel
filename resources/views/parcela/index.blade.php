@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

@section('contenido')

    <div class="text-end p-3">
        <a href="{{ route('parcela.create') }}" class="btn btn-dark btn-lg border btn-3d">
            <i class="bi bi-plus-circle pe-1"></i>
            Crear
        </a>
    </div>

    @if (session('success') || session('error'))
        <div id="liveToast"
            class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show shadow"
            role="alert">
            {{ session('success') ? session('success') : session('error') }}
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

    @if ($parcela->isEmpty())
        <div class="d-flex justify-content-center">
            <div class="card tarjeta_vacio bg-primary-subtle py-4 py-md-5 shadow">
                <div class="card-body text-center">
                    <i class="bi bi-house mb-3 text-info icono_sin_datos"></i>
                    <p class="white-text fs-5 my-2 fw-bold">No hay parcelas disponibles</p>
                    <small>
                        Actualmente no hay parcelas registradas
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
                            <th>Nombre</th>
                            <th>Dispositivo Shelly</th>
                            <th>Canal</th>
                            <th>Shelly_on</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcela as $p)
                            <tr>
                                <td class="align-middle">{{ $p->id }}</td>
                                <td class="align-middle">{{ $p->nombre }}</td>
                                <td class="align-middle">{{ $p->shelly }}</td>
                                <td class="align-middle">{{ $p->canal }}</td>
                                <td class="align-middle">
                                    @if ($p->shelly_on)
                                        <span class="badge text-bg-success">Encendido</span>
                                    @else
                                        <span class="badge text-bg-secondary">Apagado</span>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('parcela.show', $p) }}" class="btn btn-primary btn-3d fs-6 p-2">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('parcela.edit', $p) }}" class="btn-custom btn-editar fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete" data-nombre="{{ $p->nombre }}"
                                        data-ruta="{{ route('parcela.destroy', $p) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body d-block d-lg-none py-1">
                @foreach ($parcela as $p)
                    <div class="card my-3">
                        <div class="card-header"><span class="fw-bold">{{ $p->nombre }}</span></div>
                        <div class="card-body">
                            <p><span class="fw-bold">ID : </span> {{ $p->id }}</p>
                            <p><span class="fw-bold">Nombre : </span> {{ $p->nombre }}</p>
                            <p><span class="fw-bold">Dispositivo Shelly : </span> {{ $p->shelly }}</p>
                            <p><span class="fw-bold">Canal : </span> {{ $p->canal }}</p>
                            <p><span class="fw-bold">Shelly_on : </span>
                                @if ($p->shelly_on)
                                    <span class="badge text-bg-success">Encendido</span>
                                @else
                                    <span class="badge text-bg-secondary">Apagado</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer d-flex gap-2 justify-content-end">
                            <div class="d-flex gap-2">
                                <a href="{{ route('parcela.show', $p) }}" class="btn btn-primary btn-3d fs-6 p-2">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('parcela.edit', $p) }}" class="btn-custom btn-editar fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-danger fs-6 p-2 btn-3d" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                    data-nombre="{{ $p->nombre }}" data-ruta="{{ route('parcela.destroy', $p) }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer py-0">
                {{ $parcela->links('vendor.pagination.custom') }}
            </div>
        </div>
        <!-- Modal eliminar -->
        <x-modal-delete />
    @endif
@endsection
