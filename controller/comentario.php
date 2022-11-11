<?php
require_once("../models/comentario.php");
$modelo = new Comentario();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    // Agrega los casos aquí
    // Crea tus funciones en el models correpondiente
    case "insertarComentario":
        $datos = $modelo->insertarComentario($body['com'], $body['idu_com'], $body['ida_com']);
        echo json_encode($datos);
        break;
    case "obtenerComentarios":
        $datos = $modelos->obtenerComentarios($body['ida_com']);
        echo json_encode($datos);
        break;
}