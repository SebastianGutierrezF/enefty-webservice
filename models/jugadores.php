<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Jugadores extends Conexion {
    
    function getJugadores() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM equiposjugadores;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
   
}

?>