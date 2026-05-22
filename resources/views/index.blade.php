@extends('plantilla')

@section('titulo', 'Inicio')

@section('contenido')
    @if (session('success'))
        <div id="liveToast" class="alert alert-success alert-dismissible fade show shadow mt-3 mb-0" role="alert">
            {{ session('success') || session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('liveToast');
                if (el) new bootstrap.Alert(el).close();
            }, 5000);
        </script>
    @endif
    <div class="container-fluid pt-4">
        <div class="row g-4">

            @foreach ($parcela as $p)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                    <div class="card border border-dark-subtle shadow-lg h-100 text-dark">

                        <div class="{{ $p->shelly_on ? 'bg-success' : 'bg-danger' }} pb-2">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="fw-bold m-0"> {{ $p->nombre }}</h4>
                                <div
                                    class="rounded-circle border border-2 {{ $p->shelly_on ? 'border-success bg-success' : 'border-danger bg-danger' }} p-2">
                                </div>
                            </div>

                            <div
                                class="rounded-3 px-2 py-1 d-flex align-items-center mb-4 border border-1 border-dark-subtle text-white {{ $p->shelly_on ? 'bg-success' : 'bg-danger' }}">
                                <i class="bi {{ $p->shelly_on ? 'bi-lightning-charge-fill' : 'bi-power' }} fs-6"></i>
                                <span class="ms-2 fw-semibold">
                                    {{ $p->shelly_on ? 'Encendido' : 'Apagado' }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <form method="POST" action="{{ route('parcela.toggle', $p) }}" class="m-0">
                                    @csrf
                                    <button type="submit"
                                        class="btn {{ $p->shelly_on ? 'btn-success' : 'btn-danger' }} p-2 fs-5">
                                        <i class="bi bi-power"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
