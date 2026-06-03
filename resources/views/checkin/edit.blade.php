@extends('plantilla')

@section('titulo', 'Gestión de check-in')

@section('contenido')
    <div class="container-fluid">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100 shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Editar check-in</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('checkin.update', $checkin->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container-fluid pt-3 pb-2">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="id_cliente" class="form-label fw-bold">Cliente</label>
                                        <select class="form-select border border-dark-subtle" id="id_cliente"
                                            name="id_cliente">
                                            <option value="" class="text-dark" disabled selected>
                                                Selecciona un cliente
                                            </option>
                                            @foreach ($cliente as $c)
                                                <option value="{{ $c->id }}"
                                                    {{ old('id_cliente', $checkin->id_cliente) == $c->id ? 'selected' : '' }}>
                                                    {{ $c->nombre . ' ' . $c->apellidos }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_cliente'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('id_cliente') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="id_parcela" class="form-label fw-bold">Parcela</label>
                                        <select class="form-select border border-dark-subtle" id="id_parcela"
                                            name="id_parcela">
                                            <option value="" class="text-dark" disabled selected>
                                                Selecciona una parcela
                                            </option>
                                            @foreach ($parcela as $p)
                                                <option value="{{ $p->id }}"
                                                    {{ old('id_parcela', $checkin->id_parcela) == $p->id ? 'selected' : '' }}>
                                                    {{ $p->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_parcela'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('id_parcela') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="id_tarifa" class="form-label fw-bold">Tarifa</label>
                                        <select class="form-select border border-dark-subtle" id="id_tarifa"
                                            name="id_tarifa">
                                            <option value="" class="text-dark" disabled selected>
                                                Selecciona una tarifa
                                            </option>
                                            @foreach ($tarifa as $t)
                                                <option value="{{ $t->id }}"
                                                    {{ old('id_tarifa', $checkin->id_tarifa) == $t->id ? 'selected' : '' }}>
                                                    {{ $t->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_tarifa'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('id_tarifa') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="fecha_entrada" class="form-label fw-bold">Fecha entrada</label>
                                        <input type="date" class="form-control border border-dark-subtle"
                                            id="fecha_entrada" name="fecha_entrada" value="{{ old('fecha_entrada', $checkin->fecha_entrada) }}">
                                        @if ($errors->has('fecha_entrada'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('fecha_entrada') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="fecha_salida" class="form-label fw-bold">Fecha salida</label>
                                        <input type="date" class="form-control border border-dark-subtle"
                                            id="fecha_salida" name="fecha_salida" value="{{ old('fecha_salida', $checkin->fecha_salida) }}">
                                        @if ($errors->has('fecha_salida'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('fecha_salida') }}
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
