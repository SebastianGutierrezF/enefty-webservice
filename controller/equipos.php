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
    case "agregarEquipo":
        $datos = $modelos->agregarEquipo($body['nombre_e'], $body['logo_e']);
        echo json_encode($datos);
        break;
    case "editarEquipo":
        $datos = $modelos->editarEquipo($body['id_e'], $body['nombre_e'], $body['logo_e']);
        echo json_encode($datos);
        break;
    case "borrarEquipo":
        $datos = $modelos->borrarEquipo($body['id_e']);
        echo json_encode($datos);
        break;

}
