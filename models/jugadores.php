<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Jugadores extends Conexion {
    
    function getJugadoresEquipos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM equiposjugadores;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function getJugadores() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM jugadorview";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarJugador($nombre, $apellidos, $fechan, $id_e) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL agregarjugador(?, ?, ?, ?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $fechan);
        $sql->bindValue(4, $id_e);
        return $sql->execute();
    }

    function editarJugador($id_j, $nombre, $apellidos, $fechan, $id_e) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL editarjugador(?, ?, ?, ?, ?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $fechan);
        $sql->bindValue(4, $id_e);
        $sql->bindValue(5, $id_j);
        return $sql->execute();
    }

    function borrarJugador($id_j) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL borrarjugador(?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_j);
        return $sql->execute();
    }
   
}

?>