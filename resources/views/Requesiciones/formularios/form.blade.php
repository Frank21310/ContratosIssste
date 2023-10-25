@csrf


@if (count($errors) > 0)

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        @foreach ($dependenciaempleados as $dependenciaempleado)
            <input type="text" name="dependencia_id_dependencia"
                value="{{ Auth::user()->empleado->dependenciaempleado->id_dependencia }}" class="form-control" hidden>
            <input type="text" value="{{ Auth::user()->empleado->dependenciaempleado->nombre }}" class="form-control"
                readonly>
        @endforeach
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <select name="area_id_area" class="form-control" id="area_id_area">
            <option value="">Seleccione el area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id_area  }}">
                    {{ $area['nombre_area'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    {{-- Fecha de elaboracion --}}
    <div class="col">
        <label>Fecha de elaboracion:</label>
        <input type="date" name="fecha_elaboracion" class="form-control">
    </div>
    {{-- Numero de requisicion --}}
    <div class="col">
        <label>No. requisicion: </label>
        <input type="text" name="no_requesicion" class="form-control" placeholder="100XXXX"  value="{{old('no_requesicion')}}">
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <input type="date" class="form-control" name="fecha_requerida" value="{{old('fecha_requerida')}}">
    </div>
</div>
<div class="row">
    {{-- Lugar de entrega --}}
    <div class="col">
        <label>Lugar de entrega: </label>
        {{-- <select name="area_id_area" class="form-control" id="area_id_area">
            <option value="">Seleccione el area</option>
            @foreach ($entregas as $entrega)
                <option value="{{ $entrega->nombre }}">
                    {{ $entrega['nombre'] }}</option>
            @endforeach
        </select> --}}
        <input type="text" name="lugar_entrega" class="form-control" 
            placeholder="Escriba la direccion del lugar de entrega...." value="{{old('lugar_entrega')}}">
    </div>
</div>

<hr>

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

{{-- Div que agrega mas partidas --}}
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
        <span id="subtotal" class="form-control">0</span>
    </div>
</div>

<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span id="iva" class="form-control">0</span>
    </div>
</div>

<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" id="gravamientos" min="0" placeholder="0.00" step="0.01"
            type="text" class="form-control" value="{{old('otros_gravamientos')}}">
    </div>
</div>
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input  name="total" id="total" placeholder="0.00" step="0.01"
            type="text" class="form-control" readonly>
    </div>
</div>

<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <input type="text" placeholder="Ingresa el nombre de los anexos que se identifique a la solicitud"
            class="form-control" name="anexos" value="{{ old('anexos') }}">
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col mx-auto p-2">
        <label>Anticipo: </label>
        <input type="text" class="form-control" name="aticipos" placeholder="Ingrese si requiere anticipo"
            value="{{ old('aticipos') }}">
    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>
        <input type="text" placeholder="Ingresa el numero de oficio por el que se le autorizo el presupuesto"
            class="form-control" name="autorizacion_presupuesto" value="{{ old('autorizacion_presupuesto') }}">
    </div>
    {{-- Existencia en almacen --}}
    <div class="col mx-auto p-2">
        <label>Existencia en almacen: </label>
        <select name="existencia_almacen"  class="form-control" id="condiciones">

            <option  value="1">Si
            </option>
            <option value="0">No
            </option>
        </select>
    </div>
</div>

<div class="row">
    {{-- Observaciones --}}
    <div class="col mx-auto p-2">
        <label>Observaciones: </label>
        <textarea class="form-control" name="observaciones" placeholder="Observaciones de la solicitud....."
            value="{{old('observaciones') }}" rows="3"></textarea>
    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <select class="form-control" id="condiciones">
            <option name="registro_sanitario"
                value="{{1}}">Si
            </option>
            <option name="registro_sanitario"
                value="{{2}}">No
            </option>
        </select>
    </div>
    {{-- Normas --}}
    <div class="col-4 mx-auto p-2">
        <label>Normas/Nivel de inspeccion: </label>
        <input type="text" class="form-control" name="normas"
            placeholder="Ingrese las normas que sean necesarias"
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
            placeholder="Ingrese si requiere metodo de prueba"
            value="{{ isset($metodos_id_metodos) ? $requisicion->metodos_id_metodos : old('metodos_id_metodos') }}">
    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <select class="form-control" id="condiciones">
                    @foreach ($garantias as $garantia)
                        <option name="garantia_id_garantia"
                            value="{{ isset($requisicion) ? $requisicion->garantia_id_garantia : old('garantia_id_garantia') }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label>Porcentaje: </label>
                <input type="text" class="form-control" name="porcentaje"
                    value="{{ isset($porcentaje) ? $requisicion->porcentaje : old('porcentaje') }}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <select class="form-control" id="condiciones">
                        @foreach ($condiciones as $condicion)
                            <option name="condicion_id_condicion"
                                value="{{ isset($requisicion) ? $requisicion->condicion_id_condicion : old('condicion_id_condicion') }}">
                                {{ $condicion->nombre_condicion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col">
                <label>Plurianualidad: </label>
                <select class="form-control" id="condiciones">
                    <option name="pluralidad"
                        value="{{ isset($requisicion) ? $requisicion->pluralidad : old('pluralidad') }}">Si</option>
                    <option>No</option>
                    <option name="pluralidad"
                        value="{{ isset($requisicion) ? $requisicion->pluralidad : old('pluralidad') }}">Si</option>
                    <option>Si</option>
                </select>
            </div>
            <div class="col">
                <label>Meses: </label>
                <input type="text" class="form-control" name="meses"
                    value="{{ isset($requisicion) ? $requisicion->meses : old('meses') }}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <input type="text" class="form-control" name="penas_convencionales"
                    value="{{ isset($requisicion) ? $requisicion->penas_convencionales : old('penas_convencionales') }}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Tiempo de fabricacion: </label>
                <input type="text" class="form-control" name="tiempo_fabricacion"
                    value="{{ isset($requisicion) ? $requisicion->tiempo_fabricacion : old('tiempo_fabricacion') }}">
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <label>Solicita: </label>
        <span type="text" class="form-control" name="solicita"
            value="{{ isset($requisicion) ? $requisicion->solicita : old('tiempo_fabricacion') }}">{{ Auth::user()->empleado->nombre }}{{ Auth::user()->empleado->apellido_paterno }}{{ Auth::user()->empleado->apellido_materno }}</span>
    </div>
    <div class="col">
        <label>Autoriza: </label>
        <input type="text" class="form-control" name="autoriza"
            value="{{ isset($requisicion) ? $requisicion->autoriza : old('autoriza') }}">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

{{-- Filtro de insumos --}}
<script>
    // Manejar el cambio en el primer select
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
                    select.append('<option id="datacucop" value="">Selecciona un insumo</option>');

                    $.each(data, function(index, item) {
                        select.append('<option value="' + item.clave_cucop + '">' + item
                            .descripcion_insumo + '</option>');

                    });
                }

            });
        } else {
            $('#insumoCucop').empty();
            $('#insumoCucop').append('<option value="">Sin valores</option>');
        }
    });
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
