<?php

class Principal extends Controller {
    public function __construct()
    {
        parent::__construct();
        session_name('gestion');
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Iniciar sesión';
        $data['script'] = 'login.js';
        $this->views->getView('principal', 'index', $data);
    }

    public function login()
    {
        // print_r($_POST);
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $data = $this->model->getUsuario($usuario);
        // print_r($data);
        // exit();
        if (!empty($data)) {
            if (password_verify($clave, $data['clave'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['nombre_completo'] = $data['nombre_completo'];
                $res = array('msg' => 'Inicio de sesión exitoso', 'type' => 'success');
            } else {
                $res = array('msg' => 'Los datos ingresados son incorrectos', 'type' => 'warning');
            }
        } else {
            $res = array('msg' => 'El usuario no existe', 'type' => 'warning');
        }
        echo json_encode($res, JSON_UNESCAPED_SLASHES);
        die();
    }

    public function salir()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}