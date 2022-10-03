<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Arbitros extends Conexion {
    
    function getArbitros() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM arbitro;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
   
}

?>