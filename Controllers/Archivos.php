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
        $data['archivos'] = $this->model->getArchivos($this->id_usuario);        
        $this->views->getView('archivos', 'index', $data);
    }
}