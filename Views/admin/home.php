<?php include_once 'Views/templates/header.php' ?>

            <div class="app-content">
                <?php include 'Views/components/menu.php'; ?>
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
                                            <a href="#" class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-<?=$archivo['id']?>" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-<?=$archivo['id']?>">
                                                <li><a class="dropdown-item compartir" href="#" id="<?=$archivo['id']?>">Compartir</a></li>
                                                <li><a class="dropdown-item" href="#">Descargar</a></li>
                                                <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php include_once 'Views/components/modal.php' ?>
                    </div>
                </div>
            </div>

<?php include_once 'Views/templates/footer.php' ?>