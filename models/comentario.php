<?php
require_once("../conexion.php");

class Comentario extends Conexion {
    
    // Crea aquí tus funciones
    function insertarComentario($com, $idu_com, $ida_com) {
        $db = parent::connect();
        parent::set_names();
        $sql = "INSERT INTO comentario(com, idu_com, ida_com) VALUES (?,?,?);";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $com);
        $sql->bindValue(1, $idu_com);
        $sql->bindValue(1, $ida_com);
        return $sql->execute();
    }

    function obtenerComentario($ida_com) {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT comentario.com, comentario.idu_com, usuario.usuario_u FROM comentario JOIN usuario ON usuario.id_u = comentario.idu_com WHERE comentario.ida_com = ?;";
        $sql = $db->prepare($sql);
        $sql->bindValue(1, $ida_com);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerComentarios() {
        $db = parent::connect();
        parent::set_names();
        $sql = "SELECT * FROM comentario;";
        $sql = $db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}