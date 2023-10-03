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



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
