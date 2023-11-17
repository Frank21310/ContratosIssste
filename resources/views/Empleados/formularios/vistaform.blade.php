@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Num. Empleado</label>
            <span type="text" class="form-control" name="num_empleado">{{(isset($Empleado))?$Empleado->num_empleado:old('num_empleado')}}</span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre </label>
            <span type="text" class="form-control" name="nombre">{{(isset($Empleado))?$Empleado->nombre:old('nombre')}}</span>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Paterno</label>
            <span type="text" class="form-control" name="apellido_paterno">{{(isset($Empleado))?$Empleado->apellido_paterno:old('apellido_paterno')}}</span>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Materno</label>
            <span type="text" class="form-control" name="apellido_materno">{{(isset($Empleado))?$Empleado->apellido_materno:old('apellido_materno')}}</span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Cargo</label>
            <span type="text" class="form-control" name="cargo_id_cargo">{{(isset($Empleado))?$Empleado->cargo->nombre_cargo:old('cargo_id_cargo')}}</span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Dependencia</label>
            <span type="text" class="form-control" name="cargo_id_cargo">{{ $Empleado->dependencia->nombre }}</span>
        </div>
    </div>

</div>
