<?php

class PrincipalModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($usuario)
    {
        $sql = "SELECT *, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM usuarios WHERE usuario = '$usuario' AND estado = 1";
        return $this->select($sql);
    }
}