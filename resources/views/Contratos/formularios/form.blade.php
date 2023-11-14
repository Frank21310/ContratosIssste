@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre del Rol</label>
            <input type="text" class="form-control" name="nombre_rol" value="{{(isset($rol))?$rol->nombre_rol:old('nombre_rol')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Permisos</label>
            <input type="text" class="form-control" name="permiso_id_permisos" value="{{(isset($rol))?$rol->permiso_id_permisos:old('permiso_id_permisos')}}" required>
        </div>
    </div>

</div>
