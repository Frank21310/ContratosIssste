@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Editar requisicion</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('SeguimientoRequisicion.index') }}" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('SeguimientoRequisicion.update', $requisicion->id_requisicion) }}" method="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('SeguimientoRequisicion.formularios.editableform')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary ml-auto BotonRojo" form="create">
                <i class="fas fa-plus"></i>
                Editar
            </button>

        </div>
    </div>
@endsection