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
   
    function agregarPartido($equipo1, $equipo2, $fecha, $hora, $arbitro) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL agregarpartido(?,?,?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $equipo1);
        $sql->bindValue(2, $equipo2);
        $sql->bindValue(3, $fecha);
        $sql->bindValue(4, $hora);
        $sql->bindValue(5, $arbitro);
        return $sql->execute();
    }

    function borrarPartido($id_p) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL borrarpartido(?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_p);
        return $sql->execute();
    }

    function editarPartido($id_p, $id_a, $id_e1, $id_e2, $fecha, $hora) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL editarpartido(?,?,?,?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_p);
        $sql->bindValue(2, $id_a);
        $sql->bindValue(3, $id_e1);
        $sql->bindValue(4, $id_e2);
        $sql->bindValue(5, $fecha);
        $sql->bindValue(6, $hora);
        return $sql->execute();
    }
}

?>