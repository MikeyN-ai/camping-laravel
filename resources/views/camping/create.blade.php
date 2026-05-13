@extends('plantilla')

@section('titulo', 'Gestión de camping')

@section('contenido')
    <div class="container-fluid">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-lg-3 d-none d-lg-flex">

            </div>

            <div class="col-12 col-lg-6">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title py-1">Crear camping</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('camping.store') }}" method="POST">
                            @csrf
                            <div class="py-3">
                                <label for="nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control border border-dark-subtle" id="nombre"
                                    placeholder="Ex: CampingTamarit Beach Resort" value="{{ old('nombre') }}">
                                @if ($errors->has('nombre'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('nombre') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="direccion" class="form-label fw-bold">Dirección</label>
                                <input type="text" class="form-control border border-dark-subtle" id="direccion"
                                    placeholder="Ex: Gran Vía" value="{{ old('direccion') }}">
                                @if ($errors->has('direccion'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('direccion') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="persona_contacto" class="form-label fw-bold">Persona de contacto</label>
                                <input type="text" class="form-control border border-dark-subtle" id="persona_contacto"
                                    placeholder="Ex: David Serrano Mellinas" value="{{ old('persona_contacto') }}">
                                @if ($errors->has('persona_contacto'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('direccion') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="telefono_contacto" class="form-label fw-bold">Teléfono de contacto</label>
                                <input type="text" class="form-control border border-dark-subtle" id="telefono_contacto"
                                    placeholder="Ex: 656 56 56 56" value="{{ old('telefono_contacto') }}">
                                @if ($errors->has('telefono_contacto'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('telefono_contacto') }}
                                    </p>
                                @endif
                            </div>
                            <div class="pb-3">
                                <label for="correo_contacto" class="form-label fw-bold">Correo de contacto</label>
                                <input type="text" class="form-control border border-dark-subtle" id="correo_contacto"
                                    placeholder="Ex: example@gmail.com" value="{{ old('correo_contacto') }}">
                                @if ($errors->has('correo_contacto'))
                                    <p class="text-danger py-2">
                                        {{ $errors->first('correo_contacto') }}
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
