<?php
require_once("../conexion.php");

class Login extends Conexion {
    
    // Crea aquí tus funciones
    function login() {
        $db = parent::connect();
        parent::set_names();
    }
}