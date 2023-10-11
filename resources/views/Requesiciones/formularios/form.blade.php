@csrf

    <div class="row">
        {{-- Dependencia entidad --}}
        <div class="col">
            <label>Nombre de la dependencia o entidad:</label>
            <span type="text" name="nombre" value="{{ isset($requisicion) ? $requisicion->nombre : old('nombre') }}"
                class="form-control">{{ Auth::user()->empleado->dependenciaempleado->nombre }}</span>
        </div>
        {{-- Area Requeriente  --}}
        <div class="col">
            <label>Area requirente:</label>
            <select class="form-control" id="arearequierente">
                @foreach ($areas as $area)
                    <option name="area_id_area"
                        value="{{ isset($requisicion) ? $requisicion->area_id_area : old('area_id_area') }}">
                        {{ $area->nombre_area }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        {{-- Fecha de elaboracion --}}
        <div class="col">
            <label>Fecha de elaboracion:</label>
            <input type="date" class="form-control" name="fecha_elaboracion	"
                value="{{ isset($requisicion) ? $requisicion->fecha_elaboracion : old('fecha_elaboracion	') }}">
        </div>
        {{-- Numero de requisicion --}}
        <div class="col">
            <label>No. requisicion: </label>
            <input type="text" name="no_requesicion"
                value="{{ isset($requisicion) ? $requisicion->no_requesicion : old('no_requesicion') }}"
                class="form-control">
        </div>
        {{-- Fecha requerida --}}
        <div class="col">
            <label>Fecha requerida: </label>
            <input type="date" class="form-control" name="fecha_requerida	"
                value="{{ isset($requisicion) ? $requisicion->fecha_requerida : old('fecha_requerida	') }}">
        </div>
    </div>
    <div class="row">
        {{-- Lugar de entrega --}}
        <div class="col">
            <label>Lugar de entrega: </label>
            <input type="text" class="form-control" name="lugar_entrega	"
                value="{{ isset($requisicion) ? $requisicion->lugar_entrega : old('lugar_entrega') }}">
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col mx-auto p-2">
            <label>Num. Partida:</label>
            <input type="text" class="form-control">
        </div>
        <div class="col mx-auto p-2">
            <label>CUCoP:</label>
            <select class="form-control" id="condiciones">
                @foreach ($cucops as $cucop)
                    <option name="pais_id_pais"
                        value="{{ isset($requisicion) ? $requisicion->pais_id_pais : old('pais_id_pais') }}">
                        {{ $cucop->partida_especifica  }},{{ $cucop->descripcion  }}</option>
                @endforeach
            </select>
        </div>
        <div class="col mx-auto p-2">
            <label>Descripcion:</label>
            <input type="text" class="form-control">
        </div>
        <div class="col mx-auto p-2">
            <label>Cantidad Solicitada:</label>
            <input type="text" class="form-control">
        </div>
        <div class="col mx-auto p-2">
            <label>Unidad de medida:</label>
            <input type="text" class="form-control">
        </div>
        <div class="col mx-auto p-2">
            <label>Precio: </label>
            <input type="text" class="form-control">
        </div>
        <div class="col mx-auto p-2">
            <label>Importe:</label>
            <input type="text" class="form-control">
        </div>
        <div class=" col-1 d-flex align-items-center justify-content-md-end">
            <a href="" class="btn add-btn btn-info me-md-2 mt-4"><i class="fas fa-plus"></i></a>
        </div>


    </div>

    <div class="newData"></div>
    <div class=" col d-flex align-items-center justify-content-md-end">
        <a href="" class="btn add-btn btn-info me-md-2 mt-2"><i class="fas fa-plus"></i></a>
    </div>
    <div>
        <hr>
        <div class="row">
            <div class="col mx-auto p-2  d-flex align-items-end flex-column">
                <label>Sub Total: </label>
            </div>
            <div class="col-4 mx-auto p-2  d-flex align-items-end flex-column">
                <input type="text" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col mx-auto p-2  d-flex align-items-end flex-column">
                <label>I.V.A: </label>
            </div>
            <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
                <input type="text" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col mx-auto p-2  d-flex align-items-end flex-column">
                <label>Otros Gravamientos: </label>
            </div>
            <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col mx-auto p-2  d-flex align-items-end flex-column">
                <label>Total: </label>
            </div>
            <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
                <input type="text" class="form-control" disabled>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        {{-- Anexos --}}
        <div class="col mx-auto p-2">
            <label>Anexos: </label>
            <input type="text" class="form-control" name="anexos"
                value="{{ isset($requisicion) ? $requisicion->anexos : old('anexos') }}">
        </div>
    </div>
    <div class="row">
        {{-- Anticipos --}}
        <div class="col mx-auto p-2">
            <label>Anticipo: </label>
            <input type="text" class="form-control" name="aticipos"
                value="{{ isset($requisicion) ? $requisicion->aticipos : old('aticipos') }}">
        </div>
        {{-- Autorizacion de presupuesto --}}
        <div class="col mx-auto p-2">
            <label>Autorizacion de presupuesto: </label>
            <select class="form-control" id="condiciones">
                <option name="autorizacion_presupuesto"
                    value="{{ isset($requisicion) ? $requisicion->autorizacion_presupuesto : old('autorizacion_presupuesto') }}">
                    Si</option>
                <option name="autorizacion_presupuesto"
                    value="{{ isset($requisicion) ? $requisicion->autorizacion_presupuesto : old('autorizacion_presupuesto') }}">
                    No</option>
            </select>
        </div>
        {{-- Existencia en almacen --}}
        <div class="col mx-auto p-2">
            <label>Existencia en almacen: </label>
            <select class="form-control" id="condiciones">
                <option name="existencia_almacen"
                value="{{ isset($requisicion) ? $requisicion->existencia_almacen : old('existencia_almacen') }}">Si</option>
                <option name="existencia_almacen"
                value="{{ isset($requisicion) ? $requisicion->existencia_almacen : old('existencia_almacen') }}">No</option>
            </select>
        </div>
    </div>

    <div class="row">
        {{-- Observaciones --}}
        <div class="col mx-auto p-2">
            <label>Observaciones: </label>
            <textarea class="form-control" ame="observaciones"
            value="{{ isset($requisicion) ? $requisicion->observaciones : old('observaciones') }}" rows="3"></textarea>
        </div>
    </div>
    <div class="row">
        {{-- Registro Sanitario --}}
        <div class="col mx-auto p-2">
            <label>Registro Sanitario: </label>
            <select class="form-control" id="condiciones">
                <option name="registro_sanitario"
                value="{{ isset($requisicion) ? $requisicion->registro_sanitario : old('registro_sanitario') }}">Si</option>
                <option name="registro_sanitario"
                value="{{ isset($requisicion) ? $requisicion->registro_sanitario : old('registro_sanitario') }}">No</option>
            </select>
        </div>
        {{-- Normas --}}
        <div class="col mx-auto p-2">
            <label>Normas/Nivel de inspeccion: </label>
            <input type="text" class="form-control" name="normas"
                value="{{ isset($requisicion) ? $requisicion->normas : old('normas') }}">
        </div>
        {{-- Capacitacion --}}
        <div class="col mx-auto p-2">
            <label>Capacitacion: </label>
            <select class="form-control" id="condiciones">
                <option name="capacitacion"
                value="{{ isset($requisicion) ? $requisicion->capacitacion : old('capacitacion') }}">Si</option>
                <option name="capacitacion"
                value="{{ isset($requisicion) ? $requisicion->capacitacion : old('capacitacion') }}">No</option>
            </select>
        </div>
        {{-- Pais --}}
        <div class="col mx-auto p-2">
            <label>Pais de Origen: </label>
            <select class="form-control" id="condiciones">
                @foreach ($paises as $pais)
                    <option name="pais_id_pais"
                        value="{{ isset($requisicion) ? $requisicion->pais_id_pais : old('pais_id_pais') }}">
                        {{ $pais->nombre_pais }}</option>
                @endforeach
            </select>
        </div>
        {{-- Metodos de prueba --}}
        <div class="col mx-auto p-2">
            <label>Metodos de prueba: </label>
            <input type="text" class="form-control" name="metodos_id_metodos"
                value="{{ isset($metodos_id_metodos) ? $requisicion->metodos_id_metodos : old('metodos_id_metodos') }}">
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
            <input type="text" class="form-control" name="metodos_id_metodos"
                value="{{ isset($metodos_id_metodos) ? $requisicion->metodos_id_metodos : old('metodos_id_metodos') }}">
        </div>
        <div class="col">
            <label>Penas convencionales: </label>
            <input type="text" class="form-control" name="penas_convencionales"
                value="{{ isset($penas_convencionales) ? $requisicion->penas_convencionales : old('penas_convencionales') }}">
        </div>
        <div class="col">
            <label>Tiempo de fabricacion: </label>
            <input type="text" class="form-control" name="tiempo_fabricacion"
                value="{{ isset($tiempo_fabricacion) ? $requisicion->tiempo_fabricacion : old('tiempo_fabricacion') }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Tipo de garantia: </label>
            <select class="form-control" id="condiciones">
                @foreach ($garantias as $garantia)
                    <option value="$garantia->id_garantia">{{ $garantia->nombre_garantia }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label>Porcentaje: </label>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <label>Condiciones de entrega: </label>
            <select class="form-control" id="condiciones">
                @foreach ($condiciones as $condicion)
                    <option value="$condiciones->id_condicion">{{ $condicion->nombre_condicion }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <label>Solicita: </label>
            <span type="text" class="form-control" name="solicita"
                value="{{ isset($solicita) ? $requisicion->solicita : old('tiempo_fabricacion') }}">{{ Auth::user()->empleado->nombre }}{{ Auth::user()->empleado->apellido_paterno }}{{ Auth::user()->empleado->apellido_materno }}</span>
        </div>
        <div class="col">
            <label>Autoriza: </label>
            <span type="text" class="form-control" name="autoriza"
                value="{{ isset($autoriza) ? $requisicion->autoriza : old('autoriza') }}">XX</span>
        </div>
    </div>

<script type="text/javascript">
    $(function() {
        var i = 1;
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;

            $('.newData').append('<div id="newRow' + i + '" class="row">' +
                '<div class="col mx-auto p-2">' +
                '<label>Num. Partida:</label>' +
                ' <input type="text" class="form-control">' +
                '</div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>CUCoP:</label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>Descripcion:</label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>Cantidad Solicitada:</label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>Unidad de medida:</label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>Precio: </label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col mx-auto p-2">' +
                ' <label>Importe:</label>' +
                ' <input type="text" class="form-control">' +
                ' </div>' +
                ' <div class="col-1  d-flex align-items-center justify-content-md-end">' +
                ' <a href="" id="' + i +
                '" class="btn remove-lnk btn-danger me-md-2 mt-4"><i class="fas fa-trash"></i></a>' +
                ' </div>' +
                '</div>'
            );
        });


        $(document).on('click', '.remove-lnk', function(e) {
            e.preventDefault();

            var id = $(this).attr("id");
            $('#newRow' + id + '').remove();
        });

    });
</script>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
