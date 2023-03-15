<?php

namespace controller;

use model\Empleados;
use model\Utils;

require_once("../model/empleados.php");
require_once("../model/utils.php");

if (isset($_POST["cod_verificacion"])) {

    session_start();
    $empleado = $_SESSION["empleado"];

    if ($empleado["codigo_act"] == $_POST["cod_verificacion"]) {




        $empleado["activo"]=1;

        $gestorEmp = new Empleados();

        $conexPDO = Utils::conectar();

        $resultado = $gestorEmp->updateEmpleado($conexPDO, $empleado);
        // echo $resultado;
        // var_dump($empleado);
        include("../views/registroEmpleado.php");
    }else{
        echo "¡Codigo incorrecto! Introducelo de nuevo";
        include("../views/confirmacionView.php");
    }
    //falta un else
}
