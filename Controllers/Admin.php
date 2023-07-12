<?php

class Admin extends Controller {
    private $id_usuario;
    public function __construct()
    {
        parent::__construct();
        session_name('gestion');
        session_start();
        if (empty($_SESSION['id'])) {
            header('Location: ' . BASE_URL);
            exit();
        }
        $this->id_usuario = $_SESSION['id'];
    }

    public function index()
    {
        $data['title'] = 'Administrar archivos';
        $data['script'] = 'files.js';
        $data['active'] = 'recents';
        $carpetas = $this->model->getCarpetas($this->id_usuario);
        $data['archivos'] = $this->model->getArchivosRecientes($this->id_usuario);
        for ($i=0; $i < count($carpetas); $i++) {
            $carpetas[$i]['color'] = substr(md5($carpetas[$i]['id']), 0, 6);
            $carpetas[$i]['fecha'] = time_ago(strtotime($carpetas[$i]['created_at']));
        }
        $data['carpetas'] = $carpetas;
        $this->views->getView('admin', 'home', $data);
    }

    public function crearCarpeta()
    {
        // print_r($_POST);
        // exit();
        $nombre = $_POST['nombre'];
        if (isset($_POST)) {
            if (empty($nombre)) {
                $res = array('msg' => 'El nombre es requerido', 'type' => 'warning');
            } else {
                $verificarNombre = $this->model->getVerificar('nombre', $nombre, $this->id_usuario, 0);
                if (empty($verificarNombre)) {
                    $data = $this->model->crearCarpeta($nombre, $this->id_usuario);
                    if ($data > 0) {
                        $res = array('msg' => 'Carpeta creada con éxito', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'Error al crear carpeta', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'El nombre de carpeta ya existe', 'type' => 'warning');
                }
            }
        } else {
            $res = array('msg' => 'Error desconocido', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function subirArchivo()
    {
        // print_r($_FILES);
        // exit();
        $id_carpeta = (empty($_POST['id_carpeta'])) ? 1 : $_POST['id_carpeta'];
        $archivo = $_FILES['file'];
        $name = $archivo['name'];
        $tmp = $archivo['tmp_name'];
        $tipo = $archivo['type'];
        $size = $archivo['size'];
        $data = $this->model->subirArchivo($name, $tipo, $size, $id_carpeta, $this->id_usuario);
        if ($data > 0) {
            $destino = 'Assets/upload';
            if (!file_exists($destino)) {
                mkdir($destino);
            }
            $carpeta = $destino . '/' . $id_carpeta;
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            move_uploaded_file($tmp, $carpeta . '/' . $name);
            $res = array('msg' => 'Archivo subido con éxito', 'type' => 'success');
        } else {
            $res = array('msg' => 'Error al subir archivo', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function ver($id_carpeta)
    {
        $data['title'] = 'Listado de archivos';
        $data['active'] = 'detail';
        $data['archivos'] = $this->model->getArchivos($id_carpeta, $this->id_usuario);
        $this->views->getView('admin', 'archivos', $data);
    }
}