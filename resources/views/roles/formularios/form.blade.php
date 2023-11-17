@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre del Rol</label>
            <input type="text" class="form-control" name="nombre_rol"
                value="{{ isset($rol) ? $rol->nombre_rol : old('nombre_rol') }}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Permisos</label>
            <select name="permiso_id_permiso" class="form-control"
                value="{{ isset($rol) ? $rol->permiso_id_permisos : old('permiso_id_permisos') }}" required>
                <option value="">Seleccione un permiso</option>
                @foreach ($permisos as $permiso)
                    <option value="{{ $permiso->id_permisos}}" class="form-control">
                         {{ $permiso->nombre_permiso }}
                    </option>
                @endforeach

            </select>
        </div>
    </div>

</div>
