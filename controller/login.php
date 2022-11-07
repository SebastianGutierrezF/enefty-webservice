<?php
require_once("../models/login.php");
$modelo = new Login();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["option"]) {

    // Agrega los casos aquí
    // Crea tus funciones en el models correpondiente
    case "login":
        $datos = $modelo->;
        echo json_encode($datos);
        break;
}
