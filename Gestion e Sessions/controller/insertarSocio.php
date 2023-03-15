<?php

use model\Socios;
use model\Utils;

//Comprobamos que nos llegaron los datos
if (isset($_POST["idSocio"]) && isset($_POST["nombreSocio"]) && isset($_POST["fotoSocio"]) && isset($_POST["apellidoSocio"]) && isset($_POST["Local_idLocal"])) {

    $socio["idSocio"] = $_POST["idSocio"]; //Los asociamos a una variable
    $socio["nombreSocio"] = $_POST["nombreSocio"];
    $socio["fotoSocio"] = $_POST["fotoSocio"];
    $socio["apellidoSocio"] = $_POST["apellidoSocio"];
    $socio["Local_idLocal"] = $_POST["Local_idLocal"];


    require_once("../model/Socios.php");
    require_once("../model/Utils.php");

    $gestorSocio = new Socios();

    $conexPDO = Utils::conectar();

    $resultado = $gestorSocio->addSocio($conexPDO, $socio); //Añadimos el socio llamando al modelo

    if ($resultado != null) {
        $mensaje = "El socio se ha insertado correctamente"; //Mensaje
    } else $mensaje = "Ha habido un fallo al insertar el socio";

    $datosTotales = $gestorSocio->getSocios($conexPDO);
    $datosEnviar = $gestorSocio->getSociosPag($conexPDO,0);

    include("../views/mainPage.php");
} else { //Si no le han llegado los datos pues le enviamos al controlador con la acción de insertar
    $accion = "insertar";

    include("../views/modifyPage.php");
}
