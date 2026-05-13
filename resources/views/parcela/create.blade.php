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
                                <label for="idioma" class="form-label fw-bold">Idioma</label>
                                <input type="text" class="form-control border border-dark-subtle" id="idioma"
                                    placeholder="Ex: Inglés" value="{{ old('idioma') }}">
                                @if ($errors->has('idioma'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('idioma') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="abreviatura" class="form-label fw-bold">Abreviatura</label>
                                <input type="text" class="form-control border border-dark-subtle" id="abreviatura"
                                    placeholder="Ex: EN" value="{{ old('abreviatura') }}">
                                @if ($errors->has('abreviatura'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('abreviatura') }}
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

