<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Usuario extends Conexion {
    
    function agregarSaldo($id_u, $saldo_u) {
        $db = parent::connect();
        parent::set_names();
        $sql = "UPDATE usuario SET saldo_u = saldo_u + ? WHERE id_u = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $saldo_u);
        $sql->bindValue(2, $id_u);
        return $sql->execute();
    }


    public function login($usuario_u,$email_u,$pass){
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT id_u, pass FROM usuario WHERE email_u = ? OR usuario_u = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $email_u);
        $sql->bindValue(2, $usuario_u);
        $sql->execute();
        $query = $sql->fetch();
        // Si encuentra al usuario y la contraseña coincide entonces retorna los datos
        if ($query && password_verify($pass, $query['pass'])) {
            $result['id_u'] = $query['id_u'];

        } else {
            $result['id_u'] = 0;
        }
        return $result;

    }

    public function agregarUsuario($usuario_u, $nombres_u, $apellidos_u, $email_u, $pass) {
        $link = parent::connect();
        parent::set_names();
        // Encripta la contraseña recbidia y la manda a la BD
        $passencrypt = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario(`usuario_u`, `nombres_u`, `apelldos_u`, `email_u`, `pass`) VALUES (?,?,?,?,?);";
        $sql = $link->prepare($sql);
        $sql->bindValue(1, $usuario_u);
        $sql->bindValue(2, $nombres_u);
        $sql->bindValue(3, $apellidos_u);
        $sql->bindValue(4, $email_u);
        $sql->bindValue(5, $passencrypt);
        $result['status'] = $sql->execute();
        return $result;
    }

}
