@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

@section('contenido')
    <div class="container-fluid pb-4">
        
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100 shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Crear parcela</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('parcela.store') }}" method="POST">
                            @csrf

                            <div class="container-fluid py-2">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control border border-dark-subtle
                                                        @if ($errors->has('nombre'))
                                                            is-invalid
                                                        @endif" id="nombre" name="nombre" placeholder="Ex: Parcela 1"
                                            value="{{ old('nombre') }}">
                                        @if ($errors->has('nombre'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('nombre') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="shelly" class="form-label fw-bold">Dispositivo Shelly</label>
                                        <input type="text" class="form-control border border-dark-subtle
                                                        @if ($errors->has('shelly'))
                                                            is-invalid
                                                        @endif" id="shelly" name="shelly" placeholder="Ex: shelly-00001"
                                            value="{{ old('shelly') }}">
                                        @if ($errors->has('shelly'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('shelly') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="canal" class="form-label fw-bold">Canal</label>
                                        <input type="text" class="form-control border border-dark-subtle
                                                    @if ($errors->has('canal'))
                                                        is-invalid
                                                    @endif" id="canal"
                                            name="canal" placeholder="Ex: 0" value="{{ old('canal') }}">
                                        @if ($errors->has('canal'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('canal') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 d-flex align-items-center gap-2 py-2">
                                        <input type="checkbox" class="form-check-input
                                                    @if ($errors->has('shelly_on'))
                                                        is-invalid
                                                    @endif" id="shelly_on" name="shelly_on"
                                            value="1" {{ old('shelly_on') ? 'checked' : '' }}>

                                        <label class="form-check-label fw-bold" for="shelly_on">
                                            <span id="estadoShelly"
                                                class="badge {{ old('shelly_on') ? 'text-bg-success' : 'text-bg-secondary' }}">
                                                {{ old('shelly_on') ? 'Encendido' : 'Apagado' }}
                                            </span>
                                        </label>
                                    </div>

                                    <div class="col-12 pt-2">
                                        <button type="submit" class="btn btn-dark w-100 py-2 fs-6">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('shelly_on');
        const estado = document.getElementById('estadoShelly');

        checkbox.addEventListener('change', function () {

            estado.replaceChildren();

            if (this.checked) {
                estado.appendChild(document.createTextNode('Encendido'));
                estado.classList.remove('text-bg-secondary');
                estado.classList.add('text-bg-success');
            } else {
                estado.appendChild(document.createTextNode('Apagado'));
                estado.classList.remove('text-bg-success');
                estado.classList.add('text-bg-secondary');
            }
        });
    </script>
@endsection
