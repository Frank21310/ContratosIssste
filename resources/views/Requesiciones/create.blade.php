@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Nueva requisición</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Requesiciones.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('Requesiciones.store') }}" method="POST" enctype="multipart/form-data" id="create">

                @include('Requesiciones.formularios.form')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <button type="button" class="btn btn-primary ml-auto" form="create" data-bs-toggle="modal" data-bs-target="#subirArchivosModal">
                <i class="fas fa-plus"></i>
                Subir Archivos
            </button>


            <!-- Modal para subir archivos -->
            <div class="modal fade" id="subirArchivosModal" tabindex="-1" aria-labelledby="subirArchivosModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subirArchivosModalLabel">Subir Archivos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para subir archivos -->
                            <form action="{{ route('upload_files') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="files[]" multiple>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <!-- Script para mostrar la ventana emergente al guardar datos -->
    <script>
        document.getElementById('btn-guardar-datos').addEventListener('click', function() {
            $('#modalSubirArchivos').modal('show');
        });
    </script>
@endsection
