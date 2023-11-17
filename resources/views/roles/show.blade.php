@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Vista del rol de {{$rol->nombre_rol}} </h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('roles.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('roles.formularios.vistaform')
            </form>
        </div>
        <hr>
    </div>
@endsection