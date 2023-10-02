@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card mt-3 ">
    <div class="card-header">
        <div>
            <h5 class=""row align-items-start"">Usuarios</h5>
        </div>
        <div class="col-md-2 ms-auto">
            <a href="{{ route('Usuarios.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i>
                Agregar
            </a>
        </div>
        
    </div>

    <div class="card-body">
        <div class="row">
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
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Users as $User)
                            <tr>
                                <td>{{ $User->empleado_num }}</td>
                                <td>{{ $User->email }}</td>
                                <td>{{ $User->rol_id }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-primary"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>

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
        @if ($Users->total() > 10)
            {{ $users->links() }}
        @endif
    </div>


    <div class="card ">
        <div class="card-header text-center">
          Agregar Rol
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3 py-4">
                  <label class="form-label">Nombre Rol</label>
                  <input type="text" class="form-control" aria-describedby="Ingresa Rol">
                  
                </div>
                <div id="IngresaRol" class="form-text">Asigna las acciones a realizar con el rol</div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="CheckCrear">
                    <label class="form-check-label" for="CheckCrear">Crear Peticiones</label>
                  </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="CheckVisualizar">
                  <label class="form-check-label" for="CheckVisualizar">Visualizar Peticiones</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="CheckEliminar">
                    <label class="form-check-label" for="CheckEliminar">Eliminar Peticiones</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="CheckEliminar">
                    <label class="form-check-label" for="CheckEliminar">Administrador</label>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </form>
        </div>
        <div class="card-footer text-body-secondary">
          Solo agregar un rol en caso de ser necesario
        </div>
      </div>
</div>
@endsection
