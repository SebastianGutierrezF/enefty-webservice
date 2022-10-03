<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Partidos extends Conexion {
    
    function getPartidos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM partidos;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
   
}

?>