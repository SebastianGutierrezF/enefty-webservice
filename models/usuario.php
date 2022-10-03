<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Usuario extends Conexion {
    
    function login($email, $pass) {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT pass FROM usuario WHERE email = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();
        $query = $sql->fetch();
        // Si encuentra al usuario y la contraseña coincide entonces retorna los datos
        if ($query && password_verify($pass, $query['pass'])) {
            return true;
        } else {
            return false;
        }
    }

}

?>