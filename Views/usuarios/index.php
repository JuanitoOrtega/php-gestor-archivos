<?php include_once 'Views/templates/header.php' ?>
                        
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description d-flex align-items-center">
                                    <div class="page-description-content flex-grow-1">
                                        <h1><?=$data['title']?></h1>
                                    </div>
                                    <div class="page-description-actions">
                                        <button type="button" id="btnNuevo" class="btn btn-primary"><i class="material-icons">add</i> Nuevo usuario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="tblUsuarios" class="display nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Usuario</th>
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Teléfono</th>
                                                        <th>Registro</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="title">Registrar nuevo usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="form" method="post" autocomplete="off">
                                        <input type="hidden" id="id_usuario" name="id_usuario">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nombre" class="form-label">Nombres <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">assignment_ind</span></span>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="apellido" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">assignment_ind</span></span>
                                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="correo" class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">email</span></span>
                                                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="usuario" class="form-label">Usuario <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">person</span></span>
                                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="clave" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">key</span></span>
                                                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rol" class="form-label">Rol del usuario <span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">verified_user</span></span>
                                                        <select class="form-select" id="rol" name="rol">
                                                            <option selected value="">Seleccionar rol</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Usuario</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">call</span></span>
                                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><span class="material-icons-two-tone">home</span></span>
                                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons">cancel</i>  Cancelar</button>
                                            <button type="submit" id="btnAccion" class="btn btn-outline-primary"><i class="material-icons">save</i> Registrar usuario</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include_once 'Views/templates/footer.php' ?>