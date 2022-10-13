<?php
require_once("../conexion.php");
require_once("../models/jugadores.php");
$modelos = new Jugadores();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "getJugadoresEquipos":
        $datos = $modelos->getJugadoresEquipos();
        echo json_encode($datos);
        break;
    case "getJugadores":
        $datos = $modelos->getJugadores();
        echo json_encode($datos);
        break;
    case "agregarJugador":
        $datos = $modelos->agregarJugador($body['nombre_j'], $body['apellidos_j'], $body['fechan_j'], $body['ide_jq']);
        echo json_encode($datos);
        break;
    case "editarJugador":
        $datos = $modelos->editarJugador($body['id_j'], $body['nombre_j'], $body['apellidos_j'], $body['fechan_j'], $body['ide_jq']);
        echo json_encode($datos);
        break;
    case "borrarJugador":
        $datos = $modelos->borrarJugador($body['id_j']);
        echo json_encode($datos);
        break;

}
