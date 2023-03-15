<?php

use \model\Socios;
use \model\Utils;
use \model\Local;

require_once("../model/local.php");
require_once("../model/socios.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $socio = array(); //Creamos el array del socio
    $local=array();

    $gestorSocio = new Socios();
    $gestorLocal=new Local();

    $conexPDO = Utils::conectar();
    
    $socio = $gestorSocio->getSocio($conexPDO, $id); //Socio seleccionado
    $local=$gestorLocal->getLocal($conexPDO,$socio["Local_idLocal"]); //Local del socio

    $socio["calleLocal"]=$local["calle"];
    $socio["ciudadLocal"]=$local["ciudad"];

    echo json_encode($socio); //Enviamos el socio de vuelta

}