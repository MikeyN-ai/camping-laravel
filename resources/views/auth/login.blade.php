@extends('plantilla_vacia')

@section('titulo', 'Login')

@section('contenido')
    <div class="card rounded-3 login">
        <div class="card-body p-4 pt-5 shadow-lg">
            <div class="d-flex align-items-center flex-column w-100">
                <img src={{ asset('camping2.webp') }} alt="Logo camping" class="text-center w-25">
                <h2 class="text-center">¡Bienvenido!</h2>
                <p class="fs-5">Inicia sesión en tu cuenta</p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="px-3">
                @csrf
                <div class="form-group">
                    <label for="correo" class="fw-bold py-2">Email:</label>
                    <input type="correo" class="form-control border border-dark-subtle" name="correo" id="correo" />
                </div>
                <div class="form-group">
                    <label for="password" class="fw-bold py-2">Password:</label>
                    <input type="password" class="form-control border border-dark-subtle" name="password" id="password" />
                </div>
                @if (!empty($error))
                    <div class="text-danger py-2">
                        {{ $error }}
                    </div>
                @else
                    <div class="py-2"></div>
                @endif
                <input type="submit" name="enviar" value="Enviar" class="btn btn-dark fs-6 py-2 btn-block w-100">
            </form>
        </div>
    </div>
@endsection
