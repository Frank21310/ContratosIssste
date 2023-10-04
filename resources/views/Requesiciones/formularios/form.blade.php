@csrf

<div class="row">
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <input type="text" class="form-control" value="{{ Auth::user()->empleado->dependenciaempleado->nombre }}"
            disabled>
    </div>
    <div class="col">
        <label>Area requirente:</label>
        <select class="form-control" id="arearequierente">
            <option>1</option>
            <option>2</option>

        </select>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Fecha de elaboracion:</label>
        <input type="date" class="form-control" name="Elaboracion">
    </div>
    <div class="col">
        <label>No. requesicion: </label>
        <input type="text" class="form-control" disabled>
    </div>
    <div class="col">
        <label>Fecha requerida: </label>
        <input type="date" class="form-control" name="Elaboracion">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Lugar de entrega: </label>
        <input type="text" class="form-control">
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <label>Num. Partida:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>CUCoP:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Descripcion:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Cantidad Solicitada:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Unidad de medida:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Precio: </label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Importe:</label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <a href="" class="btn btn-info"><i class="fas fa-plus"></i></a>
        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Sub Total: </label>
    </div>
    <div class="col">
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>I.V.A: </label>
    </div>
    <div class="col">
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col">
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Total: </label>
    </div>
    <div class="col">
        <input type="text" class="form-control">
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <label>Anexos: </label>
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Anticipo: </label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Autorizacion de presupuesto: </label>
        <select class="form-control" id="condiciones">
            <option>Si</option>
            <option>No</option>
        </select>
    </div>
    <div class="col">
        <label>Existencia en almacen: </label>
        <select class="form-control" id="condiciones">
            <option>Si</option>
            <option>No</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Observaciones: </label>
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Registro Sanitario: </label>
        <select class="form-control" id="condiciones">
            <option>Si</option>
            <option>No</option>
        </select>
    </div>

    <div class="col">
        <label>Normas/Nivel de inspeccion: </label>
        <input type="text" class="form-control">
    </div>

    <div class="col">
        <label>Capacitacion: </label>
        <select class="form-control" id="condiciones">
            <option>Si</option>
            <option>No</option>
        </select>
    </div>
    <div class="col">
        <label>Pais de Origen: </label>
        <select class="form-control" id="condiciones">
            <option>Mexico</option>
            <option>E.U</option>
        </select>
    </div>

    <div class="col">
        <label>Metodos de prueba: </label>
        <input type="text" class="form-control">
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <label>Plurianualidad: </label>
        <select class="form-control" id="condiciones">
            <option>Si</option>
            <option>No</option>
        </select>
    </div>
    <div class="col">
        <label>Meses: </label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Penas convencionales: </label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Tiempo de fabricacion: </label>
        <input type="text" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Tipo de garantia: </label>
        <select class="form-control" id="condiciones">
            <option>Anticipo</option>
            <option>Cumplimiento divisible</option>
            <option>Cumplimiento indivisible</option>
            <option>Vicios ocultos</option>
        </select>
    </div>
    <div class="col">
        <label>Porcentaje: </label>
        <input type="text" class="form-control">
    </div>
    <div class="col">
        <label>Condiciones de entrega: </label>
        <select class="form-control" id="condiciones">
            <option>Una sola exhibición</option>
            <option>parcialidades</option>
        </select>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <label>Solicita: </label>
        <input type="text" class="form-control" value="{{Auth::user()->empleado->nombre }}{{Auth::user()->empleado->apellido_paterno}}{{Auth::user()->empleado->apellido_materno }}">
    </div>
    <div class="col">
        <label>Autoriza: </label>
        <input type="text" class="form-control">
    </div>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
