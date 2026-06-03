@extends('plantilla')

@section('titulo', 'Gestión de idiomas')

@section('contenido')
    <div class="container-fluid pb-4">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100 shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Crear idioma</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('idioma.store') }}" method="POST">
                            @csrf
                            <div class="container-fluid pb-2 pt-3">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="idioma" class="form-label fw-bold">Idioma</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="idioma" name="idioma"
                                            placeholder="Ex: Inglés" value="{{ old('idioma') }}">
                                        @if ($errors->has('idioma'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('idioma') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="abreviatura" class="form-label fw-bold">Abreviatura</label>
                                        <input type="text" class="form-control border border-dark-subtle"
                                            id="abreviatura" name="abreviatura" placeholder="Ex: EN" value="{{ old('abreviatura') }}">
                                        @if ($errors->has('abreviatura'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('abreviatura') }}
                                            </p>
                                        @endif
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
@endsection
