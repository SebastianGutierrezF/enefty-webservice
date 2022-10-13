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
    case "inscritos":
        $datos = $modelos->inscritos($body['id_t']);
        echo json_encode($datos);
        break;
    case "quitarInscrito":
        $datos = $modelos->quitarInscrito($body['id_p'], $body['id_t']);
        echo json_encode($datos);
        break;
    case "agregarInscrito":
        $datos = $modelos->agregarInscrito($body['id_t'], $body['id_p']);
        echo json_encode($datos);
        break;
    case "editarTorneo":
        $datos = $modelos->editarTorneo($body['nombre'], $body['fechain_t'], $body['fechafin_t'], $body['id_t']);
        echo json_encode($datos);
        break;
    case "getNombresPartidos":
        $datos = $modelos->getNombresPartidos();
        echo json_encode($datos);
        break;
    case "agregarTorneo":
        $datos = $modelos->agregarTorneo($body['id_p'], $body['nombre'], $body['fechain_t'], $body['fechafin_t']);
        echo json_encode($datos);
        break;
    case "borrarTorneo":
        $datos = $modelos->borrarTorneo($body['id_t']);
        echo json_encode($datos);
        break;

}
