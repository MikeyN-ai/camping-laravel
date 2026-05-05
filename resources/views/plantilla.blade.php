<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            @yield('titulo')
        </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    @include('partials.header')
                </div>
            </div>
            <div class="row">
                <div class="col-2 m-0 p-0">
                    @include('partials.menu_lateral')
                </div>
                <div class="col-10 m-0 p-0">
                    <!--<p class="text-right pr-2 pt-2">...</p>-->
                    @yield('contenido')
                </div>
            </div>
        </div>
    </body>
</html>
