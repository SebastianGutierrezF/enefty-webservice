<?php
require_once("../conexion.php");

class Articulo extends Conexion {
    
    // Crea aquí tus funciones
    function insertarProducto() {
        $db = parent::connect();
        parent::set_names();
    }
}