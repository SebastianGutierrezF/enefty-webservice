<?php
require_once("../models/usuario.php");
$modelos = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    case "agregarSaldo":
        $datos = $modelos->agregarSaldo($body['id_u'], $body['saldo_u']);
        echo json_encode($datos);
        break;
}
