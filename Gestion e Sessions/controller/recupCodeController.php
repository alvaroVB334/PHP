<?php
use model\Empleados;
use model\Utils;

require_once("../model/empleados.php");
require_once("../model/utils.php");

if (!isset($conexPDO))
    $conexPDO = Utils::conectar();

$gestorEmpleado=new Empleados();

session_start(); //Abrimos sesión y recuperamos el empleado de la sesión
$empleado=$_SESSION["empleado"];

if (isset($_POST["codigoMetido"])) { //Recibimos el codigo previamente enviado por correo
    if ($_POST["codigoMetido"] == $empleado["codigo_act"]) {
        $status = "nuevaPass";
    } else {
        echo "Codigo incorrecto";
    }
    include_once("../views/recuperarPassView.php");
}else if ($_POST["nuevaPass"]) { //Recibimos la contraseña tras que el codigo se haya cumplimentado

    $empleado["password"] = crypt($_POST["nuevaPass"], '$6$rounds=5000$' . $empleado["salt"] . '$');
    $gestorEmpleado->updateEmpleado($conexPDO, $empleado); //Modificamos la contraseña
    echo "<p style='color:green;'>Contraseña cambiada con exito</p>";
    include_once("../views/registroEmpleado.php");
}