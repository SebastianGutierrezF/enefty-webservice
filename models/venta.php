<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Venta extends Conexion {
    
    function comprar($idu_v, $monto_v, $desc_v, $mFinal_v, $id_a) {
        $db = parent::connect();
        parent::set_names();
        $sql = "INSERT INTO venta(idu_v, monto_v, desc_v, mFinal_v) VALUES(?,?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $idu_v);
        $sql->bindValue(2, $monto_v);
        $sql->bindValue(3, $desc_v);
        $sql->bindValue(4, $mFinal_v);
        $result['INSERT'] = $sql->execute();
        
        $sql = "UPDATE articulo SET idu_a = ? WHERE id_a = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $idu_v);
        $sql->bindValue(2, $id_a);
        $result['UPDATE'] = $sql->execute();
        return $result;
    }

}

?>