<?php

class CompartidosModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getArchivosCompartidos($correo)
    {
        $sql = "SELECT d.*, a.nombre AS nombre_archivo, CONCAT(u.nombre, ' ', u.apellido) AS nombre_usuario
        FROM detalle_archivos d
        INNER JOIN archivos a ON d.id_archivo = a.id
        INNER JOIN usuarios u ON d.id_usuario = u.id
        WHERE d.correo = '$correo'";
        return $this->selectAll($sql);
    }

    public function getDetalle($id_detalle)
    {
        $sql = "SELECT d.*, a.nombre AS nombre_archivo, a.size, a.id_carpeta, CONCAT(u.nombre, ' ', u.apellido) AS nombre_usuario
        FROM detalle_archivos d
        INNER JOIN archivos a ON d.id_archivo = a.id
        INNER JOIN carpetas c ON a.id_carpeta = c.id
        INNER JOIN usuarios u ON d.id_usuario = u.id
        WHERE d.id = $id_detalle";
        return $this->select($sql);
    }

    public function getDestinatario($correo)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        return $this->select($sql);
    }
}