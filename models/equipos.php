<?php
require_once("../conexion.php");
$data = json_decode(file_get_contents("php://input"), true);

class Arbitros extends Conexion {
    
    function getEquipos() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM equipo;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarEquipo($nombre, $logo) {
        $db = parent::connect();
        parent::set_names();
        $sql = "INSERT INTO equipo(nombre_e, logo_e) VALUES(?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $logo);
        $response = $sql->execute();
        return $response;
    }

    function editarEquipo($id, $nombre, $logo) {
        $db = parent::connect();
        parent::set_names();
        $sql = "UPDATE equipo SET nombre_e = ?, logo_e = ? WHERE id_e = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $logo);
        $sql->bindValue(3, $id);
        $response = $sql->execute();
        return $response;
    }

    function borrarEquipo($id) {
        $db = parent::connect();
        parent::set_names();
        $sql = "DELETE FROM equipo WHERE id_e = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id);
        $response = $sql->execute();
        return $response;
    }
}

?>