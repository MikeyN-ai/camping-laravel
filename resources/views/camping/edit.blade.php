@extends('plantilla')

@section('titulo', 'Gestión de camping')

@section('contenido')
    <div class="container-fluid mb-4">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Editar camping</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('camping.update', $camping->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container-fluid pt-3 pb-2">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="nombre" name="nombre"
                                            placeholder="Ex: CampingTamarit Beach Resort" value="{{ old('nombre', $camping->nombre) }}">
                                        @if ($errors->has('nombre'))
                                            <p class="text-danger py-2 m-0">
                                                {{ $errors->first('nombre') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="direccion" class="form-label fw-bold">Dirección</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="direccion" name="direccion"
                                            placeholder="Ex: Gran Vía" value="{{ old('direccion', $camping->direccion) }}">
                                        @if ($errors->has('direccion'))
                                            <p class="text-danger py-2 m-0">
                                                {{ $errors->first('direccion') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="persona_contacto" class="form-label fw-bold">Persona de contacto</label>
                                        <input type="text" class="form-control border border-dark-subtle"
                                            id="persona_contacto" name="persona_contacto" placeholder="Ex: David Serrano Mellinas"
                                            value="{{ old('persona_contacto', $camping->persona_contacto) }}">
                                        @if ($errors->has('persona_contacto'))
                                            <p class="text-danger py-2 m-0">
                                                {{ $errors->first('persona_contacto') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="telefono_contacto" class="form-label fw-bold">Teléfono de
                                            contacto</label>
                                        <input type="text" class="form-control border border-dark-subtle"
                                            id="telefono_contacto" name="telefono_contacto" placeholder="Ex: 656 56 56 56"
                                            value="{{ old('telefono_contacto', $camping->telefono_contacto) }}">
                                        @if ($errors->has('telefono_contacto'))
                                            <p class="text-danger py-2 m-0">
                                                {{ $errors->first('telefono_contacto') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="correo_contacto" class="form-label fw-bold">Correo de contacto</label>
                                        <input type="text" class="form-control border border-dark-subtle"
                                            id="correo_contacto" name="correo_contacto" placeholder="Ex: example@gmail.com"
                                            value="{{ old('correo_contacto', $camping->correo_contacto) }}">
                                        @if ($errors->has('correo_contacto'))
                                            <p class="text-danger py-2 m-0">
                                                {{ $errors->first('correo_contacto') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-2">
                                        <button type="submit" class="btn btn-dark w-100 py-2 fs-6">Actualizar</button>
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
