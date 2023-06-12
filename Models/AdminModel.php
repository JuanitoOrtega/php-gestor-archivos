<?php

class AdminModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarpetas($idUsuario)
    {
        $sql = "SELECT * FROM carpetas WHERE id_usuario = $idUsuario AND estado = 1 ORDER BY id DESC LIMIT 6";
        return $this->selectAll($sql);
    }

    public function getVerificar($item, $nombre, $id_usuario, $id)
    {
        if ($id > 0) {
            $sql = "SELECT id FROM carpetas WHERE $item = '$nombre' AND id_usuario = $id_usuario AND id != $id AND estado = 1";
        } else {
            $sql = "SELECT id FROM carpetas WHERE $item = '$nombre' AND id_usuario = $id_usuario AND estado = 1";
        }
        return $this->select($sql);
    }

    public function crearCarpeta($nombre, $id_usuario)
    {
        $sql = "INSERT INTO carpetas (nombre, id_usuario) VALUES (?,?)";
        $array = array($nombre, $id_usuario);
        return $this->insertar($sql, $array);
    }

    public function delete($id)
    {
        $sql = "UPDATE carpetas SET estado = ? WHERE id = ?";
        $data = array(0, $id);
        return $this->save($sql, $data);
    }

    public function getCarpeta($id)
    {
        $sql = "SELECT * FROM carpetas WHERE id = $id";
        return $this->select($sql);
    }

    public function actualizar($nombre, $id_usuario, $id)
    {
        $sql = "UPDATE carpetas SET nombre = ?, id_usuario = ? WHERE id = ?";
        $array = array($nombre, $id_usuario, $id);
        return $this->save($sql, $array);
    }

    public function subirArchivo($nombre, $tipo, $size, $id_carpeta, $id_usuario)
    {
        $sql = "INSERT INTO archivos (nombre, tipo, size, id_carpeta, id_usuario) VALUES (?,?,?,?,?)";
        $array = array($nombre, $tipo, $size, $id_carpeta, $id_usuario);
        return $this->insertar($sql, $array);
    }

    public function getArchivosRecientes($idUsuario)
    {
        $sql = "SELECT * FROM archivos WHERE id_usuario = $idUsuario AND estado = 1 ORDER BY id DESC LIMIT 6";
        return $this->selectAll($sql);
    }

    public function getArchivos($id_carpeta, $idUsuario)
    {
        $sql = "SELECT * FROM archivos WHERE id_usuario = $idUsuario AND estado = 1 AND id_carpeta = $id_carpeta ORDER BY id DESC";
        return $this->selectAll($sql);
    }
}