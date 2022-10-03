<?php
require_once("../conexion.php");
require_once("../models/equipos.php");
$modelos = new Arbitros();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getEquipos":
        $datos = $modelos->getEquipos();
        echo json_encode($datos);
        break;

}
