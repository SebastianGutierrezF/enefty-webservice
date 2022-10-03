<?php
require_once("../conexion.php");
require_once("../models/torneos.php");
$modelos = new Torneos();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getTorneos":
        $datos = $modelos->getTorneos();
        echo json_encode($datos);
        break;

}
