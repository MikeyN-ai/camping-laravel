<div class="bg-dark h-100">

    <div class="list-group border-0 fs-5">
        <a href="{{ route('inicio')}}" class="list-group-item list-group-item-action bg-dark border-0 rounded-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('inicio') }}
        ">
            <i class="bi bi-house pe-2"></i>
            Inicio
        </a>
        <a href="{{ route('camping.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('camping.index') }}
        ">
            <i class="bi bi-signpost-2 pe-2"></i>
            Campings
        </a>
        <a href="{{ route('parcela.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('parcela.index') }}
        ">
            <i class="bi bi-houses pe-2"></i>
            Parcelas
        </a>
        <a href="{{ route('cliente.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('cliente.index')}}
        ">
            <i class="bi bi-person-badge pe-2"></i>
            Clientes
        </a>
        <a href="{{ route('checkin.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('checkin.index') }}
        ">
            <i class="bi bi-clipboard2-check pe-2"></i>
            Checkins
        </a>
        <a href="{{ route('tarifa.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('tarifa.index') }}
        ">
            <i class="bi bi-wallet2 pe-2"></i>
            Tarifas
        </a>
        <a href="{{ route('idioma.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('idioma.index')}}
        ">
            <i class="bi bi-translate pe-2"></i>
            Idioma
        </a>
        <a href="{{ route('usuario.index')}}" class="list-group-item list-group-item-action bg-dark border-0 text-white py-4 ps-4 menu_lateral
            {{ setActivo('usuario.index') }}
        ">
            <i class="bi bi-people pe-2"></i>
            Usuarios
        </a>
    </div>
</div>
