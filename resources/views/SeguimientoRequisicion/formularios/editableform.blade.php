@csrf

<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <span type="text" name="dependencia_id_dependencia"
            class="form-control">{{ isset($requisicion) ? $requisicion->dependencia_id_dependencia : old('dependencia_id_dependencia') }}</span>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <span type="text" name="area_id_area"
            class="form-control">{{ isset($requisicion) ? $requisicion->area_id_area : old('area_id_area') }}</span>
    </div>
</div>

<div class="row">
    {{-- Fecha de elaboracion --}}
    <div class="col">
        <label>Fecha de elaboracion:</label>
        <span type="text" name="fecha_elaboracion"
            class="form-control">{{ isset($requisicion) ? $requisicion->fecha_elaboracion : old('fecha_elaboracion') }}</span>
    </div>
    {{-- Numero de requisicion --}}
    <div class="col">
        <label>No. requisicion: </label>
        <span type="text" name="no_requesicion"
            class="form-control">{{ isset($requisicion) ? $requisicion->no_requesicion : old('no_requesicion') }}</span>
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <span type="text" name="fecha_requerida"
            class="form-control">{{ isset($requisicion) ? $requisicion->fecha_requerida : old('fecha_requerida') }}</span>

    </div>
</div>
<div class="row">
    <div class="col">
        <label>Lugar de entrega: </label>
        <span type="text" name="lugar_entrega"
            class="form-control">{{ isset($requisicion) ? $requisicion->lugar_entrega : old('lugar_entrega') }}</span>
    </div>
</div>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>Partida</th>
            <th>CUCoP</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Unidad Medida</th>
            <th>Precio</th>
            <th>Importe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requisicion->detalles as $detalle)
            <tr>
                <form action="{{ route('SeguimientoRequisicion.update', $detalle->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td><input type="text" class="form-control" name="num_partida"
                            value="{{ $detalle->num_partida }}"></td>
                    <td><input type="text" class="form-control" name="cucop" value="{{ $detalle->cucop }}"></td>
                    <td><input type="text" class="form-control" name="descripcion"
                            value="{{ $detalle->descripcion }}"></td>
                    <td><input type="text" class="form-control" name="cantidad" value="{{ $detalle->cantidad }}">
                    </td>
                    <td><input type="text" class="form-control" name="unidad_medida"
                            value="{{ $detalle->unidad_medida }}"></td>
                    <td><input type="text" class="form-control" name="precio" value="{{ $detalle->precio }}"></td>
                    <td><input type="text" class="form-control" name="importe" value="{{ $detalle->importe }}"></td>
                    <td>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save	"></i></i></button>

                        <button type="submit" class="btn btn-danger " form="detele_{{ $detalle->id }}"
                            onclick="return confirm('¿Estas seguro de eliminar el registro?')">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form action="{{ route('SeguimientoRequisicion.destroy', $detalle->id) }}"
                            id="delete_{{ $detalle->id }}" method="post" enctype="multipart/form-data" hidden>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>



{{-- Sub Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Sub Total: </label>
    </div>
    <div class="col-4 mx-auto p-2  d-flex align-items-end flex-column">
        <span id="subtotal" class="form-control"
            value="{{ isset($requisicion) ? $requisicion->subtotal : old('subtotal') }}">0</span>
    </div>
</div>

{{-- IVA --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span id="iva" class="form-control"
            value="{{ isset($requisicion) ? $requisicion->iva : old('iva') }}">0</span>
    </div>
</div>

{{-- Gravamientos --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" id="gravamientos" min="0" placeholder="0.00" step="0.01"
            type="text" class="form-control"
            value="{{ isset($requisicion) ? $requisicion->otros_gravamientos : old('otros_gravamientos') }}" readonly>
    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input value="{{ isset($requisicion) ? $requisicion->total : old('total') }}" name="total" id="total"
            placeholder="0.00" step="0.01" type="text" class="form-control" readonly>
    </div>
</div>

<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <span type="text" name="anexos"
            class="form-control">{{ isset($requisicion) ? $requisicion->anexos : old('anexos') }}</span>
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col mx-auto p-2">
        <label>Anticipo: </label>
        <span type="text" name="aticipos"
            class="form-control">{{ isset($requisicion) ? $requisicion->aticipos : old('aticipos') }}</span>
    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>
        <span type="text" name="autorizacion_presupuesto"
            class="form-control">{{ isset($requisicion) ? $requisicion->autorizacion_presupuesto : old('autorizacion_presupuesto') }}</span>
    </div>
    {{-- Existencia en almacen --}}
    <div class="col mx-auto p-2">
        <label>Existencia en almacen: </label>
        <span type="text" name="existencia_almacen"
            class="form-control">{{ isset($requisicion) ? $requisicion->existencia_almacen : old('existencia_almacen') }}</span>
    </div>
</div>

<div class="row">
    {{-- Observaciones --}}
    <div class="col mx-auto p-2">
        <label>Observaciones: </label>
        <span type="text" name="observaciones"
            class="form-control">{{ isset($requisicion) ? $requisicion->observaciones : old('observaciones') }}</span>
    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <span type="text" name="registro_sanitario"
            class="form-control">{{ isset($requisicion) ? $requisicion->registro_sanitario : old('registro_sanitario') }}</span>
    </div>
    {{-- Normas --}}
    <div class="col-4 mx-auto p-2">
        <label>Normas/Nivel de inspeccion: </label>
        <span type="text" name="normas"
            class="form-control">{{ isset($requisicion) ? $requisicion->normas : old('normas') }}</span>
    </div>
    {{-- Capacitacion --}}
    <div class="col mx-auto p-2">
        <label>Capacitacion: </label>
        <span type="text" name="capacitacion"
            class="form-control">{{ isset($requisicion) ? $requisicion->capacitacion : old('capacitacion') }}</span>

    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <span type="text" name="pais_id_pais"
            class="form-control">{{ isset($requisicion) ? $requisicion->pais_id_pais : old('pais_id_pais') }}</span>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <span type="text" name="metodos_id_metodos"
            class="form-control">{{ isset($requisicion) ? $requisicion->metodos_id_metodos : old('metodos_id_metodos') }}</span>

    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">
        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <span type="text" name="garantia_id_garantia"
                    class="form-control">{{ isset($requisicion) ? $requisicion->garantia_id_garantia : old('garantia_id_garantia') }}</span>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <span type="text" name="porcentaje"
                    class="form-control">{{ isset($requisicion) ? $requisicion->porcentaje : old('porcentaje') }}</span>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                {{-- Condiciones --}}
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <span type="text" name="condicion_id_condicion"
                        class="form-control">{{ isset($requisicion) ? $requisicion->condicion_id_condicion : old('condicion_id_condicion') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        {{-- Plurianualidad --}}
        <div class="row">
            <div class="col">
                <label>Plurianualidad: </label>
                <span type="text" name="pluralidad"
                    class="form-control">{{ isset($requisicion) ? $requisicion->pluralidad : old('pluralidad') }}</span>
            </div>
            <div class="col">
                <label>Meses: </label>
                <span type="text" name="meses"
                    class="form-control">{{ isset($requisicion) ? $requisicion->meses : old('meses') }}</span>

            </div>
        </div>
        {{-- Garantia --}}
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <span type="text" name="penas_convencionales"
                    class="form-control">{{ isset($requisicion) ? $requisicion->penas_convencionales : old('penas_convencionales') }}</span>
            </div>
        </div>
        {{-- Fabricacion --}}
        <div class="row">
            <div class="col">
                <label>Tiempo de fabricacion: </label>
                <span type="text" name="tiempo_fabricacion"
                    class="form-control">{{ isset($requisicion) ? $requisicion->tiempo_fabricacion : old('tiempo_fabricacion') }}</span>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    {{-- Solicita --}}
    <div class="col">
        <label>Solicita: </label>
        <span type="text" name="solicita"
            class="form-control">{{ isset($requisicion) ? $requisicion->solicita : old('solicita') }}</span>
    </div>
    {{-- Autoriza --}}
    <div class="col">
        <label>Autoriza: </label>
        <span type="text" name="autoriza"
            class="form-control">{{ isset($requisicion) ? $requisicion->autoriza : old('autoriza') }}</span>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
