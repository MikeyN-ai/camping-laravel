@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

@section('contenido')

    <div class="container-fluid p-0 pt-1">
        <form action="{{ route('parcela.index') }}" method="GET" class="rounded bg-white border shadow mt-4 pt-3 mb-1">
            <div class="row mx-2">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputNombre"
                            aria-describedby="nombreHelp" placeholder="Filtrar por nombre..." maxlength="100" name="nombre"
                            value="{{ request('nombre') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputDispositivo" class="form-label">Dispositivo Shelly</label>
                        <input type="text" class="form-control border border-dark-subtle" id="inputDispositivo"
                            aria-describedby="dispositivoHelp" placeholder="Filtrar por dispositivo..." maxlength="100" name="shelly"
                            value="{{ request('shelly') }}" />
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="inputShellyOn" class="form-label">Estado Shelly</label>
                        <select class="form-select border border-dark-subtle" id="inputShellyOn" name="shelly_on">
                            <option value="">Todos</option>
                            <option value="1" {{ request('shelly_on') == '1' ? 'selected' : '' }}>Encendido</option>
                            <option value="0" {{ request('shelly_on') == '0' ? 'selected' : '' }}>Apagado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row px-2">
                <div class="col-12 px-4 pb-3">
                    <div class="d-grid gap-2 mx-auto d-md-flex justify-content-md-end">
                        <button type="submit" class="btn-custom btn-filtrar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-funnel pe-1" alt="Filtrar"></i>
                            Filtrar
                        </button>
                        <a href="{{ route('parcela.index') }}" class="btn-custom btn-limpiar py-1 px-2 text-white btn-3d">
                            <i class="bi bi-trash pe-1" alt="Limpiar"></i>
                            Limpiar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
                                    <a href="{{ route('parcela.show', $p) }}" class="btn-custom btn-ver text-dark btn-3d fs-6 p-2">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('parcela.edit', $p) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal"
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
                                <a href="{{ route('parcela.show', $p) }}" class="btn-custom btn-ver text-dark btn-3d fs-6 p-2">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('parcela.edit', $p) }}" class="btn-custom btn-editar text-dark fs-6 p-2 btn-3d">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn-custom btn-borrar text-white fs-6 p-2 btn-3d" data-bs-toggle="modal" data-bs-target="#modalDelete"
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
