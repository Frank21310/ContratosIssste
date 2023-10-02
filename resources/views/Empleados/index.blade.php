@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Empleados</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Empleados.create') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <h3>Tabla de Empleados</h3>
                <p>Tabla que muestra los empleados existentes</p>
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
                                <th>Num. Empleadp</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Cargo</th>
                                <th>Dependencia</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Empleados as $Empleado)
                                <tr>
                                    <td>{{ $Empleado->num_empleado }}</td>
                                    <td>{{ $Empleado->nombre }}</td>
                                    <td>{{ $Empleado->apellido_paterno }}</td>
                                    <td>{{ $Empleado->apellido_materno }}</td>
                                    <td>{{ $Empleado->cargo_id_cargo }}</td>
                                    <td>{{ $Empleado->dependencia_id_dependencia }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('Empleados.show', $Empleado->num_empleado) }}" class="btn btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('Empleados.edit', $Empleado->num_empleado) }}" class="btn btn-primary"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger " form="detele_{{ $Empleado->num_empleado }}"
                                                onclick="return confirm('¿Estas seguro de eliminar el registro?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{ route('Empleados.destroy', $Empleado->num_empleado) }}"
                                                id="delete_{{ $Empleado->id_rol }}" method="post"
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
