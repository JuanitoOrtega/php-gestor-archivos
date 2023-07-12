<?php

class Archivos extends Controller {
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
        $data['title'] = 'Archivos';
        $data['active'] = 'todos';
        $data['script'] = 'files.js';
        $data['archivos'] = $this->model->getArchivos($this->id_usuario);

        $carpetas = $this->model->getCarpetas($this->id_usuario);
        for ($i=0; $i < count($carpetas); $i++) {
            $carpetas[$i]['color'] = substr(md5($carpetas[$i]['id']), 0, 6);
            $carpetas[$i]['fecha'] = time_ago(strtotime($carpetas[$i]['created_at']));
        }
        $data['carpetas'] = $carpetas;

        $this->views->getView('archivos', 'index', $data);
    }

    public function getUsuarios()
    {
        $valor = $_GET['q'];
        $data = $this->model->getUsuarios($valor);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['text'] = $data[$i]['nombre'] . ' | ' . $data[$i]['correo'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function compartir()
    {
        // print_r($_POST);
        $id_archivo = $_POST['id_archivo'];
        $usuarios = $_POST['usuarios'];
        $res = 0;
        for ($i=0; $i < count($usuarios); $i++) {
            $dato = $this->model->getUsuario($usuarios[$i]);
            $result = $this->model->getDetalle($dato['correo'], $id_archivo);
            if (empty($result)) {
                $res = $this->model->registrarDetalle($dato['correo'], $id_archivo, $this->id_usuario);
            } else {
                $res = 1;
            }
        }
        if ($res > 0) {
            $res = array('msg' => 'Archivo compartido exitosamente', 'type' => 'success');
        } else {
            $res = array('msg' => 'Error al compartir archivo', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}