{{-- Agregar mas campos --}}
<script type="text/javascript">
    $(function() {
        var i = 1;

        function addNewRow() {
            return `
            <div id="newRow${i}" class="row">
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
                        <input type="text" class="form-control span-cucop" name="cucop"  readonly>
                    </div>
                </div>
                <div class="col-5 align-items-center">
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
                                <option value="{{ $unidad->idunidad_medida }}">
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
                <div class="col-1 d-flex align-items-center flex-column">
                <a href="" id="${i}" class="btn remove-lnk btn-danger me-md-2 mt-4"><i class="fas fa-trash"></i></a>
                </div>
            </div>`;
        }
    });


        // Agrega un evento de escucha a ambos campos de entrada.
        inputCantidad.addEventListener('input', calcularMultiplicacion);
        inputPrecio.addEventListener('input', calcularMultiplicacion);
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


        // Manejar el evento de clic en el botón "Agregar Campo"
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;
            $('.newData').append(addNewRow());
        });

        // Manejar el evento de clic en el botón "Eliminar Campo"
        $(document).on('click', '.remove-lnk', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            $('#newRow' + id + '').remove();
        });

        // Inicializar el botón para agregar campos
        $('.newData').append(addNewRow());


        //Script para buscar el insumo con la descripcion
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
        // Script para mostrar la Clave Cucop
        $('.select-insumo').on('change', function() {
            var selectedOption = $(this).val();
            $('.span-cucop').val(selectedOption);
        });
        
</script>

<script type="text/javascript">
    $(function() {
        var i = 1;

        function addNewRow() {
            return `
            <div id="newRow${i}" class="row">
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
                        <input type="text" class="form-control span-cucop" name="cucop"  readonly>
                    </div>
                </div>
                <div class="col-5 align-items-center">
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
                                <option value="{{ $unidad->idunidad_medida }}">
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
                <div class="col-1 d-flex align-items-center flex-column">
                <a href="" id="${i}" class="btn remove-lnk btn-danger me-md-2 mt-4"><i class="fas fa-trash"></i></a>
                </div>
            </div>`;
        }

        // Seleccionar los elementos del DOM
        var inputCantidad = $('input[name="cantidad"]');
        var inputPrecio = $('input[name="precio"]');
        var importeElements = $('input[name="importe"]');
        var resultado = $('#resultado');
        var subtotalInput = $('#subtotal');
        var ivaInput = $('#iva');
        var totalInput = $('input[name="total"]');

        // Agrega un evento de escucha a ambos campos de entrada.
        inputCantidad.on('input', calcularMultiplicacion);
        inputPrecio.on('input', calcularMultiplicacion);
        importeElements.on('input', calcularSubTotal);

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


        // Manejar el evento de clic en el botón "Agregar Campo"
        $('.add-btn').click(function(e) {
            e.preventDefault();
            i++;
            $('.newData').append(addNewRow());
        });

        // Manejar el evento de clic en el botón "Eliminar Campo"
        $(document).on('click', '.remove-lnk', function(e) {
            e.preventDefault();
            var id = $(this).attr("id");
            $('#newRow' + id + '').remove();
        });

        // Inicializar el botón para agregar campos
        $('.newData').append(addNewRow());


        //Script para buscar el insumo con la descripcion
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
        // Script para mostrar la Clave Cucop
        $('.select-insumo').on('change', function() {
            var selectedOption = $(this).val();
            $('.span-cucop').val(selectedOption);
        });

    });
</script>

