<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-0">
        <a href="{{ route('inicio')}}" class="px-2">
            <img src="camping2.webp" alt="Logo camping" class="logo_app">
        </a>
        <a class="navbar-brand ps-3" href="{{ route('inicio')}}"> Tamarit Beach Resort </a>
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-none d-md-flex justify-content-end align-items-center w-100 pe-0 pe-md-4">
            <span class="pe-3 fs-5 fst-normal border-end border-secondary">Miguel Prueba</span>
            <a href="#" class="text-decoration-none fs-3 ps-3">
                <i class="bi bi-box-arrow-right text-dark"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse bg-dark m-0 p-0" id="navbarTogglerDemo02">
            <div class="list-group border-0 fs-5 d-md-none">
                <a href="{{ route('inicio')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 rounded-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-house pe-2"></i>
                    Inicio
                </a>
                <a href="{{ route('camping.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-signpost-2 pe-2"></i>
                    Campings
                </a>
                <a href="{{ route('parcela.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-houses pe-2"></i>
                    Parcelas
                </a>
                <a href="{{ route('cliente.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-person-badge pe-2"></i>
                    Clientes
                </a>
                <a href="{{ route('checkin.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-clipboard2-check pe-2"></i>
                    Checkins
                </a>
                <a href="{{ route('tarifa.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-wallet2 pe-2"></i>
                    Tarifas
                </a>
                <a href="{{ route('usuario.index')}}"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-people pe-2"></i>
                    Usuarios
                </a>
                <a href="#"
                    class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral">
                    <i class="bi bi-box-arrow-right pe-2"></i>
                    Cerrar sesión
                </a>
            </div>
        </div>
    </div>
</nav>
