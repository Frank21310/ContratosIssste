@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Nuevo Usuario</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Usuarios.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('Usuarios.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('Usuarios.formularios.form')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary ml-auto" form="create">
                <i class="fas fa-plus"></i>
                Crear
            </button>

        </div>
    </div>
@endsection
