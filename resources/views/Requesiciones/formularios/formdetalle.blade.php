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

{{-- Detalle requisicion --}}
<div class="row ">
    {{-- Numero de partida --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>N° Partida:</label>
        <select class="form-control " id="partida">
            <option value="">Selecciona</option>
            @foreach ($partidas as $partida)
                <option name="num_partida" value="{{ $partida->id_partida_especifica }}"
                    value="{{ isset($detallerequisicion) ? $detallerequisicion->num_partida : old('num_partida') }}"
                    class="form-control">
                    {{ $partida->id_partida_especifica }} - {{ $partida->descripcion }}
                </option>
            @endforeach
        </select>
    </div>
    {{-- Clave Cucop --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>CUCoP:</label>
        <span id="cucop" type="text" class="form-control" name="cucop"
            value="{{ isset($detallerequisicion) ? $detallerequisicion->cucop : old('cucop') }}">Clave</span>
    </div>
    {{-- descripcion --}}
    <div class="col-6 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Descripcion:</label>
        <select class="form-control" id="insumoCucop">
            <option value="">Seleccione el insumo</option>
            <option id="insumoCucopoption" class="form-control" name="descripcion"
                value="{{ isset($detallerequisicion) ? $detallerequisicion->descripcion : old('descripcion') }}">
            </option>
        </select>
    </div>
    {{-- Cantidad --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Cantidad Solicitada:</label>
        <input type="number" id="cantidad" min="0" placeholder="1.0" step="0.01" class="form-control"
            name="cantidad" value="{{ isset($detallerequisicion) ? $detallerequisicion->cantidad : old('cantidad') }}">
    </div>
    {{-- Unidad --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Medida:</label>
        <select class="form-control" id="condiciones">
            @foreach ($unidades as $unidad)
                <option name="area_id_area"
                    value="{{ isset($requisicion) ? $requisicion->area_id_area : old('area_id_area') }}">
                    {{ $unidad->descripcion_unidad }}</option>
            @endforeach
        </select>
    </div>
    {{-- Precio --}}
    <div class="col mx-auto p-2 d-flex align-items-center flex-column">
        <label>Precio: </label>
        <input type="number" id="precio" min="0" placeholder="1.0" step="0.01" class="form-control"
            name="precio" value="{{ isset($detallerequisicion) ? $detallerequisicion->precio : old('precio') }}">
    </div>
    {{-- Importe --}}
    <div class="col mx-auto p-2 d-flex align-items-center flex-column">
        <label>Importe:</label>
        <input type="number" class="form-control importe" id="importe" name="importe" value="{{ old('importe') }}"
            readonly>
    </div>
    {{-- Boton de agregar 
    <div class=" col-1 d-flex align-items-center justify-content-md-e   nd">
        <a href="" class="btn add-btn btn-info me-md-2 mt-4"><i class="fas fa-plus"></i></a>
    </div> --}}


</div>
{{-- Detalle requisicion --}}
<div class="row ">
    {{-- Numero de partida --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Num. Partida:</label>
        <select class="form-control " id="partida">
            <option value="">Selecciona</option>
            @foreach ($partidas as $partida)
                <option name="num_partida" value="{{ $partida->id_partida_especifica }}"
                    value="{{ isset($detallerequisicion) ? $detallerequisicion->num_partida : old('num_partida') }}"
                    class="form-control">
                    {{ $partida->id_partida_especifica }} - {{ $partida->descripcion }}
                </option>
            @endforeach
        </select>
    </div>
    {{-- Clave Cucop --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>CUCoP:</label>
        <span id="cucop" type="text" class="form-control" name="cucop"
            value="{{ isset($detallerequisicion) ? $detallerequisicion->cucop : old('cucop') }}">Clave</span>
    </div>
    {{-- descripcion --}}
    <div class="col-4 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Descripcion:</label>
        <select class="form-control" id="insumoCucop">
            <option value="">Seleccione el insumo</option>
            <option id="insumoCucopoption" class="form-control" name="descripcion"
                value="{{ isset($detallerequisicion) ? $detallerequisicion->descripcion : old('descripcion') }}">
            </option>
        </select>
    </div>
    {{-- Cantidad --}}
    <div class="col mx-auto p-2 d-flex align-items-center flex-column">
        <label>Cantidad Solicitada:</label>
        <input type="number" id="cantidad" min="0" placeholder="1.0" step="0.01" class="form-control"
            name="cantidad"
            value="{{ isset($detallerequisicion) ? $detallerequisicion->cantidad : old('cantidad') }}">

    </div>
    {{-- Unidad --}}
    <div class="col-1 mx-auto p-2 d-flex align-items-center flex-column">
        <label>Medida:</label>
        <select class="form-control" id="condiciones">
            @foreach ($unidades as $unidad)
                <option name="area_id_area"
                    value="{{ isset($requisicion) ? $requisicion->area_id_area : old('area_id_area') }}">
                    {{ $unidad->descripcion_unidad }}</option>
            @endforeach
        </select>
    </div>
    {{-- Precio --}}
    <div class="col mx-auto p-2 d-flex align-items-center flex-column">
        <label>Precio: </label>
        <input type="number" id="precio" min="0" placeholder="1.0" step="0.01" class="form-control"
            name="precio" value="{{ isset($detallerequisicion) ? $detallerequisicion->precio : old('precio') }}">
    </div>
    {{-- Importe --}}
    <div class="col mx-auto p-2 d-flex align-items-center flex-column">
        <label>Importe:</label>
        <input type="number" class="form-control importe" id="importe" name="importe"
            value="{{ isset($detallerequisicion) ? $detallerequisicion->importe : old('importe') }}" readonly>
    </div>
    {{-- Boton de agregar 
    <div class=" col-1 d-flex align-items-center justify-content-md-e   nd">
        <a href="" class="btn add-btn btn-info me-md-2 mt-4"><i class="fas fa-plus"></i></a>
    </div> --}}


</div>
<div class="newData"></div>


{{-- Boton de agregar --}}
<div class=" col d-flex align-items-center justify-content-md-end">
    <a href="" class="btn add-btn btn-info me-md-2 mt-2"><i class="fas fa-plus"></i></a>
</div>
<hr>

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
<script>
    $(document).ready(function() {
        $('#partida').on('change', function() {
            var partidaId = $(this).val();

            if (partidaId) {
                $.ajax({
                    url: "{{ route('fclaveCucop') }}", // Ruta correcta
                    method: 'get',
                    data: {
                        nPartida: partidaId
                    },
                    success: function(data) {
                        var select = $('#insumoCucop');
                        select.empty();
                        select.append(
                            '<option id="datacucop" value="">Selecciona un insumo</option>'
                        );

                        $.each(data, function(index, item) {
                            select.append('<option value="' + item.clave_cucop +
                                '">' + item
                                .descripcion_insumo + '</option>');

                        });
                    }

                });
            } else {
                $('#insumoCucop').empty();
                $('#insumoCucop').append('<option value="">Sin valores</option>');
            }
        });
    });
</script>

{{-- Agregar mas campos --}}
<script type="text/javascript">
    $(function() {
        var i = 1;
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;
            $('.newData').append('<div id="newRow' + i + '" class="row">' +
                '<div class="row">' +
                '{{-- Numero de partida --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Num. Partida:</label>' +
                '<select class="form-control" id="partida">' +
                '<option value="">Seleccione la partida</option>' +
                '@foreach ($partidas as $partida)' +
                '<option name="num_partida" value="{{ $partida->id_partida_especifica }}"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->num_partida : old('num_partida') }}"' +
                'class="form-control">' +
                '{{ $partida->id_partida_especifica }}, {{ $partida->descripcion }}' +
                '</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '{{-- Clave Cucop --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>CUCoP:</label>' +
                '<span id="cucop" type="text" class="form-control" name="cucop"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->cucop : old('cucop') }}">Clave</span>' +
                '</div>' +
                '{{-- descripcion --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Descripcion:</label>' +
                '<select class="form-control" id="insumoCucop">' +
                '<option id="insumoCucopoption" class="form-control" name="descripcion"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->descripcion : old('descripcion') }}">' +
                '</option>' +
                '</select>' +
                '</div>' +
                '{{-- Cantidad --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Cantidad Solicitada:</label>' +
                '<input type="number" id="cantidad" min="0" placeholder="1.0" step="0.01" class="form-control" name="cantidad"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->cantidad : old('cantidad') }}">' +
                '</div>' +
                '{{-- Unidad --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Unidad de medida:</label>' +
                '<select class="form-control" id="condiciones">' +
                '@foreach ($unidades as $unidad)' +
                '<option name="area_id_area"' +
                'value="{{ isset($requisicion) ? $requisicion->area_id_area : old('area_id_area') }}">' +
                '{{ $unidad->descripcion_unidad }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '{{-- Precio --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Precio: </label>' +
                '<input type="number" id="precio" class="form-control" name="precio"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->precio : old('precio') }}">' +
                '</div>' +
                '{{-- Importe --}}' +
                '<div class="col mx-auto p-2">' +
                '<label>Importe:</label>' +
                '<span type="number" id="importe" class="form-control" name="importe"' +
                'value="{{ isset($detallerequisicion) ? $detallerequisicion->importe : old('importe') }}"></span>' +
                '</div>' +
                '{{-- Boton de agregar --}}' +
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

{{-- Calculo de importe --}}
<script>
    // Selecciona los elementos de entrada y el elemento donde se mostrará el resultado.
    const inputCantidad = document.getElementById('cantidad');
    const inputPrecio = document.getElementById('precio');
    const resultado = document.getElementById('importe');

    const importeElements = document.querySelectorAll('.importe');
    const subtotalInput = document.getElementById('subtotal');
    const ivaInput = document.getElementById('iva');
    const inputotrosGrav = document.getElementById('gravamientos')
    const totalInput = document.getElementById('total');

    // Agrega un evento de escucha a ambos campos de entrada.
    inputCantidad.addEventListener('input', calcularMultiplicacion);
    inputPrecio.addEventListener('input', calcularMultiplicacion);
    inputotrosGrav.addEventListener('input', calcularMultiplicacion)
    importeElements.forEach((element) => {
        element.addEventListener('input', calcularSubTotal);
    });

    // Función para calcular la multiplicación y mostrar el resultado.
    function calcularMultiplicacion() {
        const numCantidad = parseFloat(inputCantidad.value) || 0;
        const numPrecio = parseFloat(inputPrecio.value) || 0;

        const multiplicacion = numCantidad * numPrecio;
        resultado.value = multiplicacion.toFixed(2);
        calcularSubTotal();
    }

    // Función para calcular el subtotal a partir de los elementos de importe.
    function calcularSubTotal() {
        let subtotal = 0;
        let iva = 0;
        const gravamiento = parseFloat(inputotrosGrav.value) || 0;

        importeElements.forEach((element) => {
            subtotal += parseFloat(element.value) || 0;
        });

        subtotalInput.textContent = subtotal.toFixed(2);

        // Calcula el IVA (puedes personalizar esta parte según tu tasa de IVA).
        iva = subtotal * 0.16; // Ejemplo: IVA al 16%.
        ivaInput.textContent = iva.toFixed(2);

        // Calcula el total sumando el subtotal y el IVA.
        total = subtotal + iva + gravamiento;
        totalInput.value = total.toFixed(2);
    }
</script>


{{-- Mostrar Clave de insumo --}}
<script>
    // Obtén una referencia al span y al select
    const spanCucop = document.getElementById('cucop');
    const selectInsumoCucop = document.getElementById('insumoCucop');

    // Escucha el evento 'change' en el select
    selectInsumoCucop.addEventListener('change', function() {
        // Obtiene el valor seleccionado del select
        const selectedOption = selectInsumoCucop.options[selectInsumoCucop.selectedIndex];
        const selectedId = selectedOption.value; // Suponiendo que el valor de la opción es el ID

        // Actualiza el contenido del span con el ID seleccionado
        spanCucop.textContent = selectedId;
    });
</script>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
