<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Torneos extends Conexion {
    
    function getTorneos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM torneo;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function inscritos($id_t) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL inscritos(?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_t);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarInscrito($id_t, $id_p) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL agregarinscrito(?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_t);
        $sql->bindValue(2, $id_p);
        return $sql->execute();
    }

    function quitarInscrito($id_p, $id_t) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL quitarinscrito(?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_p);
        $sql->bindValue(2, $id_t);
        return $sql->execute();
    }

    function editarTorneo($nombre, $fechain_t, $fechafin_t, $id_t) {
        $db = parent::connect();
        parent::set_names();
        $sql = "UPDATE torneo SET nombre = ?, fechain_t = ?, fechafin_t = ? WHERE id_t = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $fechain_t);
        $sql->bindValue(3, $fechafin_t);
        $sql->bindValue(4, $id_t);
        return $sql->execute();
    }

    function getNombresPartidos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT nEquipos, id_p FROM partidosSinAsignar;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarTorneo($id_p, $nombre, $fechain_t, $fechafin_t) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL agregartorneo(?,?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_p);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $fechain_t);
        $sql->bindValue(4, $fechafin_t);
        return $sql->execute();
    }

    function borrarTorneo($id_t) {
        $db = parent::connect();
        parent::set_names();
        $sql = "CALL borrartorneo(?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id_t);
        return $sql->execute();
    }
   
}

?>