<?php

class ArchivosModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getArchivos($id_usuario)
    {
        $sql = "SELECT * FROM archivos WHERE id_usuario = $id_usuario AND estado = 1 ORDER BY id DESC";
        return $this->selectAll($sql);
    }
}