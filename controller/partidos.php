<?php
require_once("../conexion.php");
require_once("../models/partidos.php");
$modelos = new Partidos();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getPartidos":
        $datos = $modelos->getPartidos();
        echo json_encode($datos);
        break;

}
