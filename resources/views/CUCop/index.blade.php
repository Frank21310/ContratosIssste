@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <!--<div class="row">
                    <div class="col">
                        <h2 class="">Nueva Requesicion</h2>
                    </div>
                    <div class="col g-col-6 d-flex justify-content-end ">
                        <a id="BtnAgregar" href="" class="btn btn-primary ml-auto">
                            <i class="fas fa-plus"></i>
                            Crear
                        </a>
                    </div>
                </div>-->
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <h3>CUCop</h3>
                <p>Tabla de CUCop</p>
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select name="limit" id="limit" class="custom-select">
                            @foreach ([5, 10, 20, 50] as $limit)
                                <option value="{{ $limit }}"
                                    @if (@isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                    {{ $limit }}
                                </option>
                            @endforeach
                        </select>
                        <?php
                        if (isset($_GET['page'])) {
                            $pag = $_GET['page'];
                        } else {
                            $pag = 1;
                        }
                        if (isset($_GET['limit'])) {
                            $limit = $_GET['limit'];
                        } else {
                            $limit = 10;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                            aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <div class="table table-striped">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>CUPCoP</th>
                                <th>CUPCoP +</th>
                                <th>Partida Especifica</th>
                                <th>Descripcion</th>
                                <th>CABM</th>
                                <th>Tipos de contratacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CUCops as $CUCop)
                                <tr>
                                    <td>{{ $CUCop->clave_cucop}}</td>
                                    <td>{{ $CUCop->cucop }}</td>
                                    <td>{{ $CUCop->id_partida_especifica_id }}</td>
                                    <td>{{ $CUCop->descripcion_insumo }}</td>
                                    <td>{{ $CUCop->CABM }}</td>
                                    <td>{{ $CUCop->tipo_contratacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
        </div>
    </div>

    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('CUCop.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('CUCop.index') }}?limit=" + $('#limit').val() +
                    '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
