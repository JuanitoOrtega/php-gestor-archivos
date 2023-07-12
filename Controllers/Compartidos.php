<?php

class Compartidos extends Controller {
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
        $data['title'] = 'Archivos compartidos';
        $data['script'] = 'compartidos.js';
        $data['active'] = 'compartidos';
        $correo = $_SESSION['correo'];
        $data['archivos'] = $this->model->getArchivosCompartidos($correo);
        $this->views->getView('admin', 'compartidos', $data);
    }

    public function verDetalle($id_detalle)
    {
        $data = $this->model->getDetalle($id_detalle);
        $data['fecha'] = time_ago(strtotime($data['added_at']));
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}