@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Nueva requisición</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{route('Requesiciones.create')}}" class="btn btn-primary ml-auto">
                        <i class="fas fa-plus"></i>
                        Crear
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <h3>Requisición elaboradas</h3>
                <p>Tabla de Requisición elaboradas</p>
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select name="limit" id="limit" class="custom-select">
                            @foreach ([2, 3, 5, 10] as $limit)
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
                                <th>Numero de requisición</th>
                                <th>Dependencia</th>
                                <th>Fecha de elaboracion</th>
                                <th>Solicita</th>
                                <th>Autoriza</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requisiciones as $requisicion)
                            <tr>
                                <td>{{ $requisicion->id_requisicion }}</td>
                                <td>{{ $requisicion->dependencia_id_dependencia }}</td>
                                <td>{{ $requisicion->fecha_elaboracion }}</td>
                                <td>{{ $requisicion->solicita }}</td>
                                <td>{{ $requisicion->autoriza }}</td>
                                <td>Pendiente</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('Requesiciones.show', $requisicion->id_requisicion) }}" class="btn btn-info"><i
                                                class="fas fa-eye"></i></a>

                                    </div>
                                </td>
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
            window.location.href = "{{ route('Requesiciones.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Requesiciones.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
