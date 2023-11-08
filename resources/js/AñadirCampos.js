// Script para añadir mas detallaes de la requisicion

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
            </div>
            `;
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
    });