<?php
require_once("../models/venta.php");
$modelos = new Venta();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "comprar":
        $datos = $modelos->comprar($body['idu_v'], $body['monto_v'], $body['desc_v'], $body['mFinal_v'], $body['id_a']);
        echo json_encode($datos);
        break;
    case "traerVentas":
        $datos = $modelos->traerVentas();
        echo json_encode($datos);
        break;
    case "traerVentasUsuario":
        $datos = $modelos->traerVentasUsuario($body['id_u']);
        echo json_encode($datos);
        break;
}