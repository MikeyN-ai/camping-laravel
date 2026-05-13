@extends('plantilla')

@section('titulo', 'Gestión de parcelas')

@section('contenido')
    <div class="container-fluid">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-lg-3 d-none d-lg-flex">

            </div>

            <div class="col-12 col-lg-6">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title py-1">Crear parcela</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('parcela.store') }}" method="POST">
                            @csrf
                            <div class="py-3">
                                <label for="nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control border border-dark-subtle" id="nombre"
                                    placeholder="Ex: Parcela 1" value="{{ old('nombre') }}">
                                @if ($errors->has('nombre'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('nombre') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="shelly" class="form-label fw-bold">Dispositivo Shelly</label>
                                <input type="text" class="form-control border border-dark-subtle" id="shelly"
                                    placeholder="Ex: shelly-00001" value="{{ old('shelly') }}">
                                @if ($errors->has('shelly'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('shelly') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="canal" class="form-label fw-bold">Canal</label>
                                <input type="text" class="form-control border border-dark-subtle" id="canal"
                                    placeholder="Ex: 0" value="{{ old('canal') }}">
                                @if ($errors->has('canal'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('canal') }}
                                    </p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-dark w-100 py-2 fs-5">Crear</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-0 col-lg-3 d-none d-lg-flex">

            </div>
        </div>
    </div>
@endsection

