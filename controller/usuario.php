<?php
require_once("../conexion.php");
require_once("../models/usuario.php");
$modelos = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "login":
        $datos = $modelos->login($body['email'], $body['pass'],);
        echo json_encode($datos);
        break;

}
