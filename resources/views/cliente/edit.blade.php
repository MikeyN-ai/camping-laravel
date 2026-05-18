@extends('plantilla')

@section('titulo', 'Crear cliente')

@section('contenido')
    <div class="container-fluid pb-4">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Editar cliente</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container-fluid pb-2 pt-3">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="nombre"
                                            name="nombre" value="{{ old('nombre', $cliente->nombre) }}" placeholder="Ex: Fernando">
                                        @if ($errors->has('nombre'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('nombre') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="apellidos" class="form-label fw-bold">Apellidos</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="apellidos"
                                            name="apellidos" value="{{ old('apellidos', $cliente->apellidos) }}" placeholder="Ex: González Díaz">
                                        @if ($errors->has('apellidos'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('apellidos') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="correo" class="form-label fw-bold">Correo</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="correo"
                                            name="correo" value="{{ old('correo', $cliente->correo) }}" placeholder="Ex: example@gmail.com">
                                        @if ($errors->has('correo'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('correo') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="nif" class="form-label fw-bold">NIF</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="nif"
                                            name="nif" value="{{ old('nif', $cliente->nif) }}" placeholder="Ex: 21949869A">
                                        @if ($errors->has('nif'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('nif') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="telefono"
                                            name="telefono" value="{{ old('telefono', $cliente->telefono) }}" placeholder="Ex: 656 56 56 67">
                                        @if ($errors->has('telefono'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('telefono') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="matricula" class="form-label fw-bold">Matrícula</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="matricula"
                                            name="matricula" value="{{ old('matricula', $cliente->matricula) }}"  placeholder="Ex: 8324JDL">
                                        @if ($errors->has('matricula'))
               v                             <p class="text-danger py-2">
                                                {{ $errors->first('matricula') }}
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
