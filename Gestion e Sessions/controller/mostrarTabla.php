<?php
// <--------------------------- INICIO --------------------------------->

use model\Socios;
use model\Utils;

require_once("../model/socios.php");

if(!isset($_SESSION))
session_start();

if (!isset($conexPDO))
$conexPDO = Utils::conectar();

$gestorSocio = new Socios();//Creamos el socio que llamara a las funciones
$datosTotales = $gestorSocio->getSocios($conexPDO); //Datos totales para crear la cantidad correspondiente de botones de paginación

if (isset($_SESSION["empleado"])) {
    echo "<h4 style='color:gray;'>Bienvenido " . $_SESSION['empleado']['nombreEmpleado'] . "</h4>";
    echo "<form method='POST' action='../controller/registroEmpleado.php'>";
    echo "<button style='font-size:15px; border: none; background-color:gray;' name='cerrarSesion' value='true'>Cerrar sesión</button></form>";
}

if (isset($_POST["page"])) { //Si se ha pulsado algun boton de paginación
    $offset = $_POST["page"] * 4;
    $datosEnviar = $gestorSocio->getSociosPag($conexPDO, $offset);
} else
    $datosEnviar = $gestorSocio->getSociosPag($conexPDO, 0); //Sino mostramos la primera


include_once("../views/mainPage.php");
