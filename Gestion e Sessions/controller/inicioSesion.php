<?php

use model\Empleados;
use model\Utils;

require_once("../model/empleados.php");
require_once("../model/utils.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $gestorEmpleado = new Empleados();

    if(!isset($conexPDO))
    $conexPDO = Utils::conectar();

    $empleado = $gestorEmpleado->getEmpleadoByEmail($conexPDO, $_POST["email"]);

    if ($empleado==false) { //Si el correo no existe la query devuelve vacio (0 rows)
        echo "<small style='color:red; padding:0.5em;'>Usuario o contraseña incorrecta</small>";
        include("../views/registroEmpleado.php");

    }else if ($empleado["password"] === crypt($_POST["password"], '$6$rounds=5000$' . $empleado["salt"] . '$')) {
        session_start();
        $_SESSION["empleado"] = $empleado;
        include("../controller/mostrarTabla.php");
    } else {
        echo "<small style='color:red;'>Usuario o contraseña incorrecta</small>";
        include("../views/registroEmpleado.php");
    }
}
