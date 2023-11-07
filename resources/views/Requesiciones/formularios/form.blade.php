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
        <input type="text" name="dependencia_id_dependencia"
            value="{{ Auth::user()->empleado->dependenciaempleado->id_dependencia }}" class="form-control" hidden>
        <input type="text" value="{{ Auth::user()->empleado->dependenciaempleado->nombre }}" class="form-control"
            readonly>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <select name="area_id_area" class="form-control">
            <option value="">Seleccione el area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id_area }}">
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
        <input type="text" name="no_requesicion" class="form-control" placeholder="100XXXX"
            value="{{ old('no_requesicion') }}">
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <input type="date" class="form-control" name="fecha_requerida" value="{{ old('fecha_requerida') }}">
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
            placeholder="Escriba la direccion del lugar de entrega...." value="{{ old('lugar_entrega') }}">
    </div>
</div>

<hr>

{{-- Detalle requisicion --}}
<div class="row">
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>Partida:</label>
        </div>
        <div class="row">
            <select class="form-control select-partida" name="num_partida">
                <option value="">Selecciona</option>
                @foreach ($partidas as $partida)
                    <option value="{{ $partida->id_partida_especifica }}" class="form-control">
                        {{ $partida->id_partida_especifica }} - {{ $partida->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>CUCoP:</label>
        </div>
        <div class="row">
            <input type="text" class="form-control span-cucop" name="cucop" readonly>
        </div>
    </div>
    <div class="col-6 align-items-center">
        <div class="row">
            <label>Descripcion:</label>
        </div>
        <div class="row">
            <select class="form-control select-insumo" name="descripcion">
                <option value="">Seleccione el insumo</option>
            </select>
        </div>
    </div>
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>Cantidad:</label>
        </div>
        <div class="row">
            <input type="number" name="cantidad" min="0" placeholder="1.0" step="0.01" class="form-control"
                value="{{ isset($detallerequisicion) ? $detallerequisicion->cantidad : old('cantidad') }}">
        </div>

    </div>
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>Medida:</label>
        </div>
        <div class="row">
            <select class="form-control" name="unidad_medida">
                @foreach ($unidades as $unidad) 
                    <option
                        value="{{ $unidad->idunidad_medida }}">
                        {{ $unidad->descripcion_unidad }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>Precio: </label>
        </div>
        <div class="row">
            <input type="number" name="precio" min="0" placeholder="1.0" step="0.01" class="form-control"
                name="precio" value="{{ isset($detallerequisicion) ? $detallerequisicion->precio : old('precio') }}">
        </div>
    </div>
    <div class="col-1 d-flex align-items-center flex-column">
        <div class="row">
            <label>Importe:</label>
        </div>
        <div class="row">
            <input type="number" class="form-control importe" name="importe" name="importe"
                value="{{ old('importe') }}" readonly>
        </div>
    </div>
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
        <span class="form-control subtotal">0</span>

    </div>
</div>

{{-- IVA --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span class="form-control iva">0</span>
    </div>
</div>

{{-- Gravamientos --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" class="form-control gravamientos" min="0" placeholder="0.00"
            step="0.01" type="text" value="{{ old('otros_gravamientos') }}">

    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="total" placeholder="0.00" step="0.01" type="text" class="form-control total">

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
    <div class="col-2 mx-auto p-2">
        <label>Anticipo: </label>
        <select name="aticipos" class="form-control" id="aticipos">
            <option value="1">Si
            </option>
            <option value="0">No
            </option>
        </select>

    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>

        <input type="text" placeholder="Ingresa el numero de oficio por el que se le autorizo el presupuesto"
            class="form-control" name="autorizacion_presupuesto" value="{{ old('autorizacion_presupuesto') }}">
    </div>
    {{-- Existencia en almacen --}}
    <div class="col-2 mx-auto p-2">
        <label>Existencia en almacen: </label>
        <select name="existencia_almacen" class="form-control" id="condiciones">
            <option value="1">Si
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
            value="{{ old('observaciones') }}" rows="3"></textarea>
    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <select class="form-control" name="registro_sanitario">
            <option value="Si">Si
            </option>
            <option value="nO">No
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
        <select name="capacitacion" class="form-control" id="condiciones">
            <option value="{{ 1 }}">Si</option>
            <option value="{{ 0 }}">No</option>
        </select>
    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <select class="form-control" name="pais_id_pais">
            @foreach ($paises as $pais)
                <option value="{{ $pais->id_pais }}">
                    {{ $pais['nombre_pais'] }}</option>
            @endforeach
        </select>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <select class="form-control" name="metodos_id_metodos">
            @foreach ($metodos as $metodo)
                <option value="{{ $metodo->id_metodos }}">
                    {{ $metodo['nombre_metodos'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">

        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <select class="form-control" name="garantia_id_garantia">
                    @foreach ($garantias as $garantia)
                        <option value="{{ $garantia->id_garantia }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <select name="porcentaje" class="form-control">
                    <option value="{{ '100%' }}">100%</option>

                    <option value="{{ '75%' }}">75%</option>

                    <option value="{{ '50%' }}">50%</option>

                    <option value="{{ '25%' }}">25%</option>

                    <option value="{{ '10% ' }}">10%</option>

                    <option value="{{ '0% ' }}">0%</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                {{-- Condiciones --}}
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <select class="form-control" name="condicion_id_condicion">
                        @foreach ($condiciones as $condicion)
                            <option value="{{ $condicion->id_condicion }}">
                                {{ $condicion->nombre_condicion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        {{-- Plurianualidad --}}
        <div class="row">
            <div class="col">
                <label>Plurianualidad: </label>
                <select class="form-control" name="pluralidad">
                    <option name="pluralidad" value="{{ 1 }}">Si</option>
                    <option name="pluralidad" value="{{ 0 }}">No</option>
                </select>
            </div>
            <div class="col">
                <label>Meses: </label>
                <input type="text" class="form-control" name="meses" value="{{ old('meses') }}">
            </div>
        </div>
        {{-- Garantia --}}
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <select name="penas_convencionales" class="form-control" id="penas_convencionales">
                    <option value="{{ 1 }}">Si</option>
                    <option value="{{ 0 }}">No</option>
                </select>
            </div>
        </div>
        {{-- Fabricacion --}}
        <div class="row">
            <div class="col">
                <label>Tiempo de fabricacion: </label>
                <input type="text" class="form-control" name="tiempo_fabricacion"
                    value="{{ old('tiempo_fabricacion') }}">
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    {{-- Solicita --}}
    <div class="col">
        <label>Solicita: </label>
        <input type="text" name="solicita" value="{{ Auth::user()->empleado->num_empleado }}"
            class="form-control" hidden>
        <input type="text"
            value="{{ Auth::user()->empleado->nombre }}{{ Auth::user()->empleado->apellido_paterno }}{{ Auth::user()->empleado->apellido_materno }}"
            class="form-control" readonly>
    </div>
    {{-- Autoriza --}}
    <div class="col">
        <label>Autoriza: </label>
        <input type="text" name="autoriza" value="{{ Auth::user()->empleado->num_empleado }}"
            class="form-control" hidden>
        <input type="text"
            value="{{ Auth::user()->empleado->nombre }}{{ Auth::user()->empleado->apellido_paterno }}{{ Auth::user()->empleado->apellido_materno }}"
            class="form-control" readonly>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script para buscar el insumo con la descripcion -->
<script>
    $(document).ready(function() {
        $('.select-partida').on('change', function() {
            var partidaId = $(this).val();

            if (partidaId) {
                $.ajax({
                    url: "{{ route('fclaveCucop') }}",
                    method: 'get',
                    data: {
                        nPartida: partidaId
                    },
                    success: function(data) {
                        var select = $('.select-insumo');

                        select.empty();
                        select.append(
                            '<option id="datacucop" value="">Selecciona un insumo</option>'
                        );

                        $.each(data, function(index, item) {
                            select.append('<option value="' + item.id_cucop +
                                '">' + item.descripcion_insumo + '</option>');
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
{{-- Mostrar Clave de insumo --}}
<script>
    // Obtén una referencia a los elementos con las clases correspondientes
    const spanCucop = document.querySelector('.span-cucop');
    const selectInsumoCucop = document.querySelector('.select-insumo');

    $('.select-insumo').on('change', function() {
        // Obtiene el valor seleccionado del select
        var selectedOption = $(this).val(); // El valor de la opción es la clave_cucop

        // Actualiza el contenido del span con la clave_cucop seleccionada
        $('.span-cucop').val(selectedOption);
    });
</script>
{{-- Calculo de importe --}}
<script>
    // Selecciona los elementos de entrada y el elemento donde se mostrará el resultado.
    const inputCantidad = document.querySelector('input[name="cantidad"]');
    const inputPrecio = document.querySelector('input[name="precio"]');
    const resultado = document.querySelector('input[name="importe"]');

    const importeElements = document.querySelectorAll('input[name="importe"]');
    const subtotalInput = document.querySelector('.subtotal');
    const ivaInput = document.querySelector('.iva');
    const inputotrosGrav = document.querySelector('.gravamientos');
    const totalInput = document.querySelector('.total');

    // Agrega un evento de escucha a ambos campos de entrada.
    inputCantidad.addEventListener('input', calcularMultiplicacion);
    inputPrecio.addEventListener('input', calcularMultiplicacion);
    inputotrosGrav.addEventListener('input', calcularMultiplicacion);
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


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
