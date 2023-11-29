@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Empleados</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Empleados.create') }}" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Lista de Empleados existentes</h3>
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
                                <th class="custom-th">N° Empleado</th>
                                <th class="custom-th">Nombre</th>
                                <th class="custom-th">Apellido Paterno</th>
                                <th class="custom-th">Apellido Materno</th>
                                <th class="custom-th">Cargo</th>
                                <th class="custom-th">Dependencia</th>
                                <th class="custom-th">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Empleados as $Empleado)
                                <tr>
                                    <td class="custom-td">{{ $Empleado->num_empleado }}</td>
                                    <td class="custom-td">{{ $Empleado->nombre }}</td>
                                    <td class="custom-td">{{ $Empleado->apellido_paterno }}</td>
                                    <td class="custom-td">{{ $Empleado->apellido_materno }}</td>
                                    <td class="custom-td">{{ $Empleado->cargo->nombre_cargo }}</td>
                                    <td class="custom-td">{{ $Empleado->dependencia->nombre }}</td>
                                    <td class="custom-td">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('Empleados.show', $Empleado->num_empleado) }}"
                                                class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('Empleados.edit', $Empleado->num_empleado) }}"
                                                class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger "
                                                form="detele_{{ $Empleado->num_empleado }}"
                                                onclick="return confirm('¿Estas seguro de eliminar el registro?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{ route('Empleados.destroy', $Empleado->num_empleado) }}"
                                                id="delete_{{ $Empleado->num_empleado }}" method="post"
                                                enctype="multipart/form-data" hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
            @if ($Empleados->total() > 10)
                {{ $Empleados->links() }}
            @endif
        </div>
    </div>

    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('Empleados.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Empleados.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
