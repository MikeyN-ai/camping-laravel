@extends('plantilla')

@section('titulo', 'Gestión tarifa')

@php
    $tipos = ['por_kilovatio', 'por_amperio'];
    $amperios = [12, 10, 8];
@endphp

@section('contenido')

    <div class="container-fluid pb-4">
        <div class="row pt-4 pt-md-5">
            <div class="col-0 col-md-1 col-lg-2 col-xl-3 col-xxl-4 d-none d-md-flex">

            </div>

            <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
                <div class="card w-100 shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title mb-0 py-1">Editar tarifa</h3>
                    </div>
                    <div class="card-body py-0">
                        <form action="{{ route('tarifa.update', $tarifa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="container-fluid py-2">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="nombre" name="nombre"
                                            placeholder="Ex: Temporada alta" value="{{ old('nombre', $tarifa->nombre) }}">
                                        @if ($errors->has('nombre'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('nombre') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="tipo" class="form-label fw-bold">Tipo</label>
                                        <select id="tipo" name="tipo" class="form-select border border-dark-subtle">
                                            <option disabled selected>Selecciona un tipo</option>

                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo }}"
                                                    {{ old('tipo', $tarifa->tipo) == $tipo ? 'selected' : '' }}>
                                                    {{ ucfirst(str_replace('_', ' ', $tipo)) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('tipo'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('tipo') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div id="group-precio-dia" class="col-12 mb-3">
                                        <label for="precio_dia" class="form-label fw-bold">Precio Día</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="precio_dia" name="precio_dia"
                                            placeholder="Ex: 8.00" value="{{ old('precio_dia', $tarifa->precio_dia) }}">
                                        @if ($errors->has('precio_dia'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('precio_dia') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div id="group-precio-kwh" class="col-12 mb-3">
                                        <label for="precio_kilovatio" class="form-label fw-bold">Precio Kilovatio</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="precio_kilovatio" name="precio_kilovatio"
                                            placeholder="Ex: 0.75" value="{{ old('precio_kilovatio', $tarifa->precio_kilovatio) }}">
                                        @if ($errors->has('precio_kilovatio'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('precio_kilovatio') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div id="group-kwh-gratuitos" class="col-12 mb-3">
                                        <label for="kwh_gratuitos" class="form-label fw-bold">KWh gratuitos</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="kwh_gratuitos" name="kwh_gratuitos"
                                            placeholder="Ex: 2.00" value="{{ old('kwh_gratuitos', $tarifa->kwh_gratuitos) }}">
                                        @if ($errors->has('kwh_gratuitos'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('kwh_gratuitos') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="limite_watts" class="form-label fw-bold">Limite de watts</label>
                                        <input type="text" class="form-control border border-dark-subtle" id="limite_watts" name="limite_watts"
                                            placeholder="Ex: 2450" value="{{ old('limite_watts', $tarifa->limite_watts) }}">
                                        @if ($errors->has('limite_watts'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('limite_watts') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="limite_amperios" class="form-label fw-bold">Limite amperios</label>
                                        <select name="limite_amperios" class="form-select border border-dark-subtle">
                                            <option disabled selected>Selecciona la cantidad de amperios</option>

                                            @foreach ($amperios as $amp )
                                                <option value="{{ $amp }}"
                                                    {{ old('limite_amperios', $tarifa->limite_amperios) == $amp ? 'selected' : '' }}>
                                                    {{ $amp  . " A" }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @if ($errors->has('limite_amperios'))
                                            <p class="text-danger py-2">
                                                {{ $errors->first('limite_amperios') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="col-12 pt-2">
                                        <button type="submit" class="btn btn-dark w-100 py-2 fs-6">Actualizar</button>
                                    </div>
                                </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const tipo = document.querySelector('select[name="tipo"]');
                                            if (!tipo) return;
                                            const show = (id, s) => {
                                                const el = document.getElementById(id);
                                                if (el) el.style.display = s ? '' : 'none';
                                            };
                                            const update = () => {
                                                const v = tipo.value;
                                                if (v === 'por_amperio') {
                                                    show('group-precio-dia', true);
                                                    show('group-precio-kwh', false);
                                                    show('group-kwh-gratuitos', false);
                                                } else if (v === 'por_kilovatio') {
                                                    show('group-precio-dia', false);
                                                    show('group-precio-kwh', true);
                                                    show('group-kwh-gratuitos', true);
                                                } else {
                                                    show('group-precio-dia', false);
                                                    show('group-precio-kwh', false);
                                                    show('group-kwh-gratuitos', false);
                                                }
                                            };
                                            tipo.addEventListener('change', update);
                                            update();
                                        });
                                    </script>
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
