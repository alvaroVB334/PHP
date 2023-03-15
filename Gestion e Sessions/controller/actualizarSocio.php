<?php

use \model\Socios;
use \model\Utils;



$socio = array(); //Creamos el socio que guardara los datos del formulario

if (isset($_POST["idSocio"]) && isset($_POST["nombreSocio"]) && isset($_POST["fotoSocio"]) && isset($_POST["apellidoSocio"]) && isset($_POST["Local_idLocal"])) {

    $socio["idSocio"] = $_POST["idSocio"];
    $socio["nombreSocio"] = $_POST["nombreSocio"];
    $socio["fotoSocio"] = $_POST["fotoSocio"];
    $socio["apellidoSocio"] = $_POST["apellidoSocio"];
    $socio["Local_idLocal"] = $_POST["Local_idLocal"];



    if (isset($_POST["modificar"]) && $_POST["modificar"] == "false") { //Si viene de la mainPage, nos soltara un false en el value del modificar
        $accion = "modificar";
        include("../views/modifyPage.php"); //Ergo le llevamos a la pagina de relleno de formulario
    } else {
        require_once("../model/utils.php"); //En caso de que modificar nos arroje un true, significa que ya tenemos los datos del socio a actualizar
        require_once("../model/socios.php");

        $gestorSocio = new Socios();

        $conexPDO = Utils::conectar(); //Establecemos conexión

        $resultado = $gestorSocio->updateSocio($conexPDO, $socio); //Actualizamos

        if ($resultado != null) { //Informamos del resultado
            $mensaje = "El Socio se ha actualizado correctamente"; //Mensaje
        } else {
            $mensaje = "Ha habido un fallo al actualizar el socio";

            $datosEnviar = $gestorSocio->getSocios($conexPDO); //En caso de fallo devolvemos a la pagina principal con el siguiente mensaje
            include("../views/mainPage.php");
        }
        $datosTotales = $gestorSocio->getSocios($conexPDO);
        $datosEnviar = $gestorSocio->getSociosPag($conexPDO,0);
        include("../views/mainPage.php");
    }
} else { //En caso de que no recibamos nada devolvemos a la main page
    require_once("../model/socios.php");
    require_once("../model/utils.php");

    $gestorSocio = new Socios();
    $conexPDO = Utils::conectar();

    $datosEnviar = $gestorSocio->getSocios($conexPDO);

    include("../views/mainPage.php");
}
