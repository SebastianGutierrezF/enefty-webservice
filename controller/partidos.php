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
    case "agregarPartido":
        $datos = $modelos->agregarPartido($body['id_e1'], $body['id_e2'], $body['fecha'], $body['hora'], $body['id_a']);
        echo json_encode($datos);
        break;
    case "borrarPartido":
        $datos = $modelos->borrarPartido($body['id_p']);
        echo json_encode($datos);
        break;
    case "editarPartido":
        $datos = $modelos->editarPartido($body['id_p'], $body['id_a'], $body['id_e1'], $body['id_e2'], $body['fecha'], $body['hora']);
        echo json_encode($datos);
        break;
    case "equiposCompletos":
        $datos = $modelos->equiposCompletos();
        echo json_encode($datos);
        break;
}
