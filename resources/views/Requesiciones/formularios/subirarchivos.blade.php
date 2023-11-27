            <!-- Modal para subir archivos -->
            <div class="modal fade" id="subirArchivosModal" tabindex="-1" aria-labelledby="subirArchivosModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subirArchivosModalLabel">Subir Archivos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para subir archivos -->
                            <form action="{{ route('upload_files', ['requisicion_id' => $requisicion_id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="name">
                                <input type="file" name="files" multiple>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>