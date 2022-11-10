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

}

?>