@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Crear Nueva Requisición</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a href="{{ route('Requesiciones.create') }}" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-plus"></i>
                        Crear
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Requisición elaboradas</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-2">
                            <a class="navbar-brand">Listar</a>
                        </div>
                        <div class="col-3">
                            <select name="limit" id="limit" class="form-control custom-select">
                                @foreach ([5, 10, 15, 20] as $limit)
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
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-2">
                            <a class="navbar-brand">Buscar</a>
                        </div>
                        <div class="col-10">
                            <input class="form-control custom-input" type="search" id="search" placeholder="Search"
                                aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="table table-striped">
                    <table class="table custom-table">
                        <thead class="custom-thead">
                            <tr>
                                <th class="custom-th">N° Requisición</th>
                                <th class="custom-th">Dependencia</th>
                                <th class="custom-th">Fecha de elaboracion</th>
                                <th class="custom-th">Solicita</th>
                                <th class="custom-th">Autoriza</th>
                                <th class="custom-th">Estatus</th>
                                <th class="custom-th">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="custom-thead">
                            @foreach ($requisiciones as $requisicion)
                                <tr>
                                    <td class="custom-td">{{ $requisicion->id_requisicion }}</td>
                                    <td class="custom-td">{{ $requisicion->dependenciarequesicion->nombre }}</td>
                                    <td class="custom-td">{{ $requisicion->fecha_elaboracion }}</td>
                                    <td class="custom-td">{{ $requisicion->solicita }}</td>
                                    <td class="custom-td">{{ $requisicion->autoriza }}</td>
                                    <td class="custom-td">Pendiente</td>
                                    <td class="custom-td">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('Requesiciones.show', $requisicion->id_requisicion) }}"
                                                class="btn btn-info"><i class="fas fa-eye"></i></a>

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
            @if ($requisiciones->total() > 10)
                {{ $requisiciones->links() }}
            @endif
        </div>
    </div>

    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('Requesiciones.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Requesiciones.index') }}?limit=" + $('#limit').val() +
                    '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
