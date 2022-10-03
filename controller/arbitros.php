<?php
require_once("../conexion.php");
require_once("../models/arbitros.php");
$modelos = new Arbitros();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getArbitros":
        $datos = $modelos->getArbitros();
        echo json_encode($datos);
        break;

}
