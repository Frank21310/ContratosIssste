@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Num. Empleado</label>
            <input type="text" class="form-control" name="num_empleado" value="{{(isset($Empleado))?$Empleado->num_empleado:old('num_empleado')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre </label>
            <input type="text" class="form-control" name="nombre" value="{{(isset($Empleado))?$Empleado->nombre:old('nombre')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellido_paterno" value="{{(isset($Empleado))?$Empleado->apellido_paterno:old('apellido_paterno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" name="apellido_materno" value="{{(isset($Empleado))?$Empleado->apellido_materno:old('apellido_materno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Cargo</label>
            <select class="form-control" name="cargo_id_cargo" value="{{(isset($Empleado))?$Empleado->cargo_id_cargo:old('cargo_id_cargo')}}" required>
                <option value="">Seleccione un permiso</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id_cargo}}" class="form-control">
                         {{ $cargo->nombre_cargo }}
                    </option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Dependencia</label>
            <select class="form-control" name="dependencia_id_dependencia" value="{{(isset($Empleado))?$Empleado->dependencia_id_dependencia:old('dependencia_id_dependencia')}}"  required>
                <option value="">Seleccione un permiso</option>
                @foreach ($dependecias as $dependecia)
                    <option value="{{ $dependecia->id_dependencia}}" class="form-control">
                         {{ $dependecia->nombre }}
                    </option>
                @endforeach

            </select>
        </div>
    </div>

</div>
