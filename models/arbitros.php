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

    function agregarArbitro($nombre, $apellidos, $contacto, $email, $colocacion) {
        $db = parent::connect();
        parent::set_names();
        $sql = "INSERT INTO arbitro(nombre_a, apellidos_a, contacto_a, email_a, colocacion_a) VALUES(?,?,?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $contacto);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $colocacion);
        $response = $sql->execute();
        return $response;
    }

    function editarArbitro($id, $nombre, $apellidos, $contacto, $email, $colocacion) {
        $db = parent::connect();
        parent::set_names();
        $sql = "UPDATE arbitro SET nombre_a = ?, apellidos_a = ?, contacto_a = ?, email_a = ?, colocacion_a = ? WHERE id_a = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellidos);
        $sql->bindValue(3, $contacto);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $colocacion);
        $sql->bindValue(6, $id);
        $response = $sql->execute();
        return $response;
    }

    function borrarArbitro($id) {
        $db = parent::connect();
        parent::set_names();
        $sql = "DELETE FROM arbitro WHERE id_a = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $id);
        $response = $sql->execute();
        return $response;
    }
   
}

?>