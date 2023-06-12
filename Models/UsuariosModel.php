<?php

class UsuariosModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios($estado)
    {
        $sql = "SELECT *, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM usuarios WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id, usuario, correo FROM usuarios WHERE $campo = '$valor'";
        }
        $sql = "SELECT id, usuario, correo FROM usuarios WHERE $campo = '$valor' AND id != $id";
        return $this->select($sql);
    }

    public function registrar($nombre, $apellido, $correo, $usuario, $clave, $rol, $telefono, $direccion)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, usuario, clave, rol, telefono, direccion) VALUES (?,?,?,?,?,?,?,?)";
        $array = array($nombre, $apellido, $correo, $usuario, $clave, $rol, $telefono, $direccion);
        return $this->insertar($sql, $array);
    }

    public function delete($idUsuario)
    {
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $data = array(0, $idUsuario);
        return $this->save($sql, $data);
    }

    public function getUsuario($idUsuario)
    {
        $sql = "SELECT * FROM usuarios WHERE id = $idUsuario";
        return $this->select($sql);
    }

    public function actualizar($nombre, $apellido, $correo, $usuario, $rol, $telefono, $direccion, $id)
    {
        $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, usuario = ?, rol = ?, telefono = ?, direccion = ? WHERE id = ?";
        $array = array($nombre, $apellido, $correo, $usuario, $rol, $telefono, $direccion, $id);
        return $this->save($sql, $array);
    }
}