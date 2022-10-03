<?php
require_once("../conexion.php");
require_once("../models/jugadores.php");
$modelos = new Jugadores();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getJugadores":
        $datos = $modelos->getJugadores();
        echo json_encode($datos);
        break;

}
