<?php

class Usuarios extends Controller {
    public function __construct()
    {
        parent::__construct();
        session_name('gestion');
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Usuarios';
        $data['script'] = 'usuarios.js';
        $data['active'] = 'usuarios';
        $this->views->getView('usuarios', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['id'] == 1) {
                $data[$i]['acciones'] = '<span class="badge badge-danger">Super usuario</span>';
            } else {
                $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-warning" onclick="editar('.$data[$i]['id'].')"><i class="material-icons">edit</i></button>
                    <button type="button" class="btn btn-danger" onclick="eliminar('.$data[$i]['id'].')"><i class="material-icons">delete_outline</i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        // print_r($_POST);
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $hash_clave = password_hash($clave, PASSWORD_DEFAULT);
        $rol = $_POST['rol'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id_usuario'];
        if (isset($_POST)) {
            if (empty($nombre)) {
                $res = array('msg' => 'El nombre es requerido', 'type' => 'warning');
            } else if (empty($apellido)) {
                $res = array('msg' => 'El apellido es requerido', 'type' => 'warning');
            } else if (empty($correo)) {
                $res = array('msg' => 'El correo electrónico es requerido', 'type' => 'warning');
            } else if (empty($usuario)) {
                $res = array('msg' => 'El nombre de usuario es requerido', 'type' => 'warning');
            } else if (empty($clave)) {
                $res = array('msg' => 'La contraseña es requerida', 'type' => 'warning');
            } else if (empty($rol)) {
                $res = array('msg' => 'Seleccionar el rol es requerido', 'type' => 'warning');
            } else {
                if ($id == '') {
                    $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'registrar', 0);
                    if (empty($verificarUsuario)) {
                        $verificarCorreo = $this->model->getValidar('correo', $correo, 'registrar', 0);
                        if (empty($verificarCorreo)) {
                            $data = $this->model->registrar($nombre, $apellido, $correo, $usuario, $hash_clave, $rol, $telefono, $direccion);
                            if ($data > 0) {
                                $res = array('msg' => 'Usuario registrado con éxito', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'Error al registrar usuario', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'El correo electrónico ya existe', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'El usuario ya existe', 'type' => 'warning');
                    }
                } else {
                    $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'modificar', $id);
                    if (empty($verificarUsuario)) {
                        $verificarCorreo = $this->model->getValidar('correo', $correo, 'modificar', $id);
                        if (empty($verificarCorreo)) {
                            $data = $this->model->actualizar($nombre, $apellido, $correo, $usuario, $rol, $telefono, $direccion, $id);
                            if ($data > 0) {
                                $res = array('msg' => 'Usuario actualizado con éxito', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'Error al actualizar usuario', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'El correo electrónico ya existe', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'El usuario ya existe', 'type' => 'warning');
                    }
                }
            }
        } else {
            $res = array('msg' => 'Error desconocido', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delete($idUsuario)
    {
        $data = $this->model->delete($idUsuario);
        if ($data == 1) {
            $res = array('msg' => 'Usuario eliminado con éxito', 'type' => 'success');
        } else {
            $res = array('msg' => 'Error al eliminar usuario', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($idUsuario)
    {
        $data = $this->model->getUsuario($idUsuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}