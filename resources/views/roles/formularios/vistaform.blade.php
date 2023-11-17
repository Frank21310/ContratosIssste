@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre del Rol</label>
            <span type="text" class="form-control" name="nombre_rol">
                {{ isset($rol) ? $rol->nombre_rol : old('nombre_rol') }}
            </span>
            
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Permisos</label>
            <span type="text" class="form-control" name="permiso_id_permisos">
                {{ isset($rol) ? $rol->permisorol->nombre_permiso : old('permiso_id_permisos') }}
            </span>
    </div>

</div>
