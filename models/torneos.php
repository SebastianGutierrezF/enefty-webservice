<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Torneos extends Conexion {
    
    function getTorneos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM torneos;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
   
}

?>