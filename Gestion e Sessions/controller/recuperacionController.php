<?php

use model\Empleados;
use model\Utils;

require_once("../model/empleados.php");
require_once("../model/utils.php");

if (!isset($conexPDO))
    $conexPDO = Utils::conectar();

$gestorEmpleado = new Empleados();

if (isset($_POST["enviarCorreo"])) { //Recibimos el correo a enviar

    //Rescatamos el empleado con ese Email
    $empleado = $gestorEmpleado->getEmpleadoByEmail($conexPDO, $_POST["enviarCorreo"]);

    session_start();
    $_SESSION["empleado"]=$empleado; //Guardamos en la sessión ese empleado

    if ($empleado == false) { //En caso de no existir decimos que no se ha encontrado
        echo "<p style='color: red;'>No se ha encontrado ese correo</p>";
        include_once("../views/recuperarPassView.php");
    } else {
        Utils::correo_registro($empleado); //En caso de que no enviamos el correo
        $status = "correoEnviado"; //Y cambiamos el status a correoEnviado para controlarlo mediante JS
        include_once("../views/recuperarPassView.php");
    }
} else {
    include_once("../views/recuperarPassView.php");
}
