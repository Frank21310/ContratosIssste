<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bienvenido</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Vite -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    <!-- Css -->
    <link href="{{ asset('assets/css/estilos.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <!--Topbar -->
    <div>
        @include('layouts.encabezado')
    </div>
    <!-- End of Topbar -->
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_gob.png') }}" alt="Logo" width="240"
                                        height="auto" class="my-5 mb-1">

                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_issste_nuevo.png') }}" alt="Logo"
                                        width="245" height="auto" class="mb-5 ">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 mb-3">Bienvenido</h1>
                                        <h3 class="h5 mb-2">Sistema web de contratos
                                            <p class="h5 mb-2">Bienes y Servicios</p>
                                        </h3>
                                    </div>
                                    <form class="py-5">
                                        @auth
                                            <a href="{{ url('/home') }}" class="btn btn-outline-dark" role="button"
                                                aria-disabled="true">Inicio</a>
                                            <br>
                                        @else
                                            <div class="d-grid gap-4 col-6 mx-auto">
                                                <a href="{{ route('login') }}" class="btn btn-outline-dark" role="button"
                                                    aria-disabled="true">Iniciar
                                                    Sesion</a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="btn btn-outline-dark"
                                                        tabindex="-1" role="button" aria-disabled="true">Registrarse</a>
                                                @endif
                                            </div>
                                        @endauth
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>