<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Contratos ISSSTE') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    <link href="{{ asset('assets/css/estilos.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">




</head>

<body>
    <div id="app" class="wrapper">
        @guest
        @else
        
            @include('layouts.barralateral')
        @endguest
        
        <div id="content">
            @include('layouts.encabezado')

            <main class="">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->

    

</body>



</html>
