@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="container">
        <div>
            <div>
                <h2 class="display-3">Bienvenido {{ Auth::user()->empleado->nombre }}!</h2>
                <hr>
                <p>Bienvenido al sistema web de contratos de bienes y servicios para la representación del ISSSTE en Oaxaca, actualmente se encuentra como creador de peticiones.
                </p>
            </div>
        </div>


    @endsection
