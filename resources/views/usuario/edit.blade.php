@extends('plantilla')

@section('titulo', 'Crear usuario')

@php
    $rol = ['admin', 'usuario'];
@endphp

@section('contenido')

    <div class="container-fluid pb-4">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Editar usuario</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container-fluid py-2">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="usuario" class="form-label fw-bold">Usuario</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="usuario"
                                            name="usuario" placeholder="Ex: editor"
                                            value="{{ old('usuario', $usuario->usuario) }}">
                                        @if ($errors->has('usuario'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('usuario') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="correo" class="form-label fw-bold">Correo</label>
                                        <input type="email" class="form-control border border-dark-subtle" id="correo"
                                            name="correo" placeholder="Ex: example@gmail.com"
                                            value="{{ old('correo', $usuario->correo) }}">
                                        @if ($errors->has('correo'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('correo') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="id_camping" class="form-label fw-bold">Camping</label>
                                        <select class="form-select border border-dark-subtle" id="id_camping"
                                            name="id_camping">
                                            <option value="" class="text-dark" disabled selected>
                                                Selecciona un camping
                                            </option>
                                            @foreach ($camping as $c)
                                                <option value="{{ $c->id }}"
                                                    {{ old('id_camping', $usuario->id_camping) == $c->id ? 'selected' : '' }}>
                                                    {{ $c->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_camping'))
                                            <p class="text-warning py-2">
                                                {{ $errors->first('id_camping') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="id_idioma" class="form-label fw-bold">Idioma</label>
                                        <select class="form-select border border-dark-subtle" id="id_idioma"
                                            name="id_idioma">
                                            <option value="" class="text-dark" disabled selected>
                                                Selecciona un idioma
                                            </option>
                                            @foreach ($idioma as $i)
                                                <option value="{{ $i->id }}"
                                                    {{ old('id_idioma', $usuario->id_idioma) == $i->id ? 'selected' : '' }}>
                                                    {{ $i->idioma }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_idioma'))
                                            <p class="text-warning py-2">
                                                {{ $errors->first('id_idioma') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="rol" class="form-label fw-bold">Rol</label>
                                        <select name="rol" class="form-select border border-dark-subtle">
                                            <option value="" disabled
                                                {{ old('rol', $usuario->rol) ? '' : 'selected' }}>
                                                Selecciona un rol
                                            </option>

                                            @foreach ($rol as $r)
                                                <option value="{{ $r }}"
                                                    {{ old('rol', $usuario->rol) == $r ? 'selected' : '' }}>
                                                    {{ $r }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('rol'))
                                            <p class="text-warning py-2">
                                                {{ $errors->first('rol') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="password" class="form-label fw-bold">Cambiar contraseña</label>
                                        <input type="password" class="form-control border border-dark-subtle" id="password"
                                            name="password" placeholder="Dejar vacío si no quieres cambiarla">
                                        @if ($errors->has('password'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('password') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="password_confirmation" class="form-label fw-bold">
                                            Confirmar contraseña
                                        </label>

                                        <input type="password" class="form-control border border-dark-subtle"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Repite la contraseña">

                                        @if ($errors->has('password_confirmation'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('password_confirmation') }}
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
