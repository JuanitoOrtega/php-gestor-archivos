<?php include_once 'Views/templates/header.php' ?>

            <div class="app-content">
                <?php include 'Views/templates/menu.php'; ?>
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description d-flex align-items-center">
                                    <div class="page-description-content flex-grow-1">
                                        <h1><?=$data['title']?></h1>
                                    </div>
                                    <div class="page-description-actions">
                                        <button type="button" id="btnUpload" class="btn btn-primary"><i class="material-icons">add</i>Subir archivo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-description">
                            <h1>Carpetas</h1>
                        </div>
                        <div class="row">
                            <?php foreach ($data['carpetas'] as $carpeta) { ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="card file-manager-group">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="material-icons" style="color: #<?=$carpeta['color']?>;">folder</i>
                                        <div class="file-manager-group-info flex-fill">
                                            <a href="#" id="<?=$carpeta['id']?>" class="file-manager-group-title carpetas"><?=$carpeta['nombre']?></a>
                                            <span class="file-manager-group-about"><?=$carpeta['fecha']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="section-description">
                            <h1>Archivos recientes</h1>
                        </div>
                        <div class="row">
                            <?php foreach ($data['archivos'] as $archivo) { ?>
                            <div class="col-md-6">
                                <div class="card file-manager-recent-item">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                            <a href="#" class="file-manager-recent-item-title flex-fill"><?=$archivo['nombre']?></a>
                                            <span class="p-h-sm"><?=round($archivo['size'] / 1024, 2)?> KB</span>
                                            <span class="p-h-sm text-muted"><?=date('d.m.Y', strtotime($archivo['created_at']))?></span>
                                            <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-1" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-1">
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                                <li><a class="dropdown-item" href="#">Download</a></li>
                                                <li><a class="dropdown-item" href="#">Move to folder</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

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
                            <div class="modal-dialog modal-sm">
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
                                        <div class="modal-footer">
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
                                        <input type="hidden" name="id_carpeta" id="id_carpeta">
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
                    </div>
                </div>
            </div>

<?php include_once 'Views/templates/footer.php' ?>