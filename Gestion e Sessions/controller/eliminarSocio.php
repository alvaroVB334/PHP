<?php

use model\Socios;
use model\Utils;

require_once("../model/socios.php"); //Importamos el codigo del socio

$gestorSocio = new Socios();

$conexPDO = Utils::conectar();

if (isset($_POST["idSocio"])) { //Eliminamos el socio según la id recibida
    $result = $gestorSocio->delSocio($conexPDO, $_POST["idSocio"]);

    if ($result == null || $result == 0) {
        $mensaje = "Error de acceso a BD"; //Mensajes a enviar a la main page
    } else $mensaje = "Cliente eliminado correctamente";
}

$datosTotales = $gestorSocio->getSocios($conexPDO);
$datosEnviar = $gestorSocio->getSociosPag($conexPDO,0); //Recolectamos los datos de nuevo e incluimos la página

include("../views/mainPage.php");
