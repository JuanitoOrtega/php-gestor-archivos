                        <!-- Modal -->
                        <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="title">Subir o crear carpeta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-grid">
                                            <button type="button" id="btnNuevaCarpeta" class="btn btn-outline-primary"><i class="material-icons">folder</i> Nueva carpeta</button>
                                            <hr>
                                            <input type="file" class="d-none" name="file" id="file">
                                            <button type="button" id="btnSubirArchivo" class="btn btn-outline-success"><i class="material-icons">folder_zip</i> Subir archivo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="carpetaModal" tabindex="-1" aria-labelledby="carpetaModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="titleCarpeta">Nueva carpeta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="formCarpeta" method="post" autocomplete="off">
                                        <div class="modal-body">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><span class="material-icons-two-tone">folder</span></span>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Crear carpeta</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="compartirModal" tabindex="-1" aria-labelledby="compartirModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="titleCompartir">Compartir</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id_carpeta">
                                        <div class="d-grid">
                                            <a href="#" id="btnVer" class="btn btn-outline-info"><i class="material-icons">folder_zip</i> Ver</a>
                                            <hr>
                                            <button type="button" id="btnSubir" class="btn btn-outline-primary"><i class="material-icons">folder_zip</i> Subir archivo</button>
                                            <hr>
                                            <button type="button" id="btnCompartir" class="btn btn-outline-success"><i class="material-icons">share</i> Compartir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="usuariosModal" tabindex="-1" aria-labelledby="usuariosModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="titleUsuarios">Agregar usuarios</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="frmCompartir" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" id="id_archivo" name="id_archivo">
                                            <select class="js-states form-control" id="usuarios" name="usuarios[]" tabindex="-1" style="display: none; width: 100%" multiple="multiple">
                                            </select>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Compartir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>