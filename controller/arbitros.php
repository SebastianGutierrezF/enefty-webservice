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
    case "agregarArbitro":
        $datos = $modelos->agregarArbitro($body['nombre_a'], $body['apellidos_a'], $body['contacto_a'], $body['email_a'], $body['colocacion_a']);
        echo json_encode($datos);
        break;
    case "editarArbitro":
        $datos = $modelos->editarArbitro($body['id_a'], $body['nombre_a'], $body['apellidos_a'], $body['contacto_a'], $body['email_a'], $body['colocacion_a']);
        echo json_encode($datos);
        break;
    case "borrarArbitro":
        $datos = $modelos->borrarArbitro($body['id_a']);
        echo json_encode($datos);
        break;
}
