<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-0">
        <a href="{{ route('inicio') }}" class="px-2">
            <img src="{{ asset('camping2.webp') }}" alt="Logo camping" class="logo_app">
        </a>
        <a class="navbar-brand ps-3" href="{{ route('inicio') }}">
            {{ auth()->user()?->camping?->nombre ?? 'Camping' }}
        </a>
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (auth()->user()->usuario)
            {{-- Solo visible en escritorio --}}
            <div class="d-none d-lg-flex justify-content-end align-items-center w-100 pe-4">
                <div class="dropdown">
                    <button class="btn btn-link text-dark fs-5 text-decoration-none" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle pe-1"></i>
                        {{ auth()->user()->usuario }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right pe-1"></i>
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="collapse navbar-collapse bg-dark m-0 p-0 position-absolute w-100 start-0 top-100 z-3"
            id="navbarTogglerDemo02">
            <div class="list-group border-0 fs-5 px-2 py-1 d-lg-none">
                <a href="{{ route('inicio') }}" class="list-group-item list-group-item-action bg-dark border-0 rounded-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('inicio') || request()->routeIs('inicio') ? 'seleccionado' : '' }}
                    ">
                    <i class="bi bi-house pe-2"></i>
                    Inicio
                </a>
                @if (auth()->user()?->rol === 'admin')
                    <a href="{{ route('camping.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                            {{ setActivo('camping') }}
                        ">
                        <i class="bi bi-signpost-2 pe-2"></i>
                        Campings
                    </a>
                @endif
                <a href="{{ route('parcela.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('parcela') }}
                     ">
                    <i class="bi bi-houses pe-2"></i>
                    Parcelas
                </a>
                <a href="{{ route('cliente.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('cliente') }}
                    ">
                    <i class="bi bi-person-badge pe-2"></i>
                    Clientes
                </a>
                <a href="{{ route('checkin.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('checkin') }}
                    ">
                    <i class="bi bi-clipboard2-check pe-2"></i>
                    Checkins
                </a>
                <a href="{{ route('tarifa.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('tarifa') }}
                    ">
                    <i class="bi bi-wallet2 pe-2"></i>
                    Tarifas
                </a>

                <a href="{{ route('idioma.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                        {{ setActivo('idioma') }}
                    ">
                    <i class="bi bi-translate pe-2"></i>
                    Idioma
                </a>
                @if (isAdmin())
                    <a href="{{ route('usuario.index') }}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3
                            {{ setActivo('usuario') }}
                        ">
                        <i class="bi bi-people pe-2"></i>
                        Usuarios
                    </a>
                @endif
                <a href="{{ route('logout') }}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-3 my-1 ps-4 menu_lateral rounded-3 ">
                    <i class="bi bi-box-arrow-right pe-2"></i>
                    Cerrar sesión
                </a>
            </div>
        </div>
    </div>
</nav>
