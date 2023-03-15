<?php

namespace controller;
use model\Empleados;
use model\Utils;

require_once("../model/empleados.php");
require_once("../model/utils.php");
/**
 * Se reciben los datos del formulario de registro de la vista correspondiente
 * (Validados previamente en jquery)
 */
if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["local"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"]) && isset($_POST["dni"])) {

    $empleado=array();

    //Le asignamos los datos al array que uguarda el empleado ya limpios mediante la función que quita caracteres especiales
    $empleado["nombreEmpleado"]=Utils::limpiar_datos($_POST["nombre"]);
    $empleado["apellidosEmpleado"]=Utils::limpiar_datos($_POST["apellido"]);
    $empleado["Local_idLocal"]=Utils::limpiar_datos($_POST["local"]);
    $empleado["dni"]=Utils::limpiar_datos($_POST["dni"]);
    $empleado["email"]=Utils::limpiar_datos($_POST["email"]);

    //Generamos el salt
    $salt=Utils::generar_salt(16);
    $empleado["salt"]=$salt;

    //Encriptamos crypt para encriptar la contraseña según la salt generada usando SHA-512
    $empleado["password"]=crypt($_POST["password"],'$6$rounds=5000$'.$salt.'$');

    //Por defecto el usuario no está activo hasta que confirme el correo
    $empleado["activo"]=0;

    //Generamos un codig de activación aleatorio
    $empleado["codigo_act"]=Utils::generar_codigo_activacion();


    //COMENZAMOS CON EL PROCESO DE INSERCCIÓN
    $gestorEmpleado= new Empleados();

    if(!isset($conexPDO))
    $conexPDO=Utils::conectar();

    $empleado["idEmpleados"]=$gestorEmpleado->getCountEmpleados($conexPDO)+1; //Asignamos las id 
    $result=$gestorEmpleado->addEmpleado($conexPDO,$empleado);

    if($result !=null){
        $mensaje="El usuario se ha registrado correctamente";
    }else{
        $mensaje="Ha habido un error";
    }
    
    session_start();
    $_SESSION["empleado"] = $empleado; //Guardamos el empleado en la sesión

    Utils::correo_registro($empleado);

    include("../views/confirmacionView.php");

}else{
        if($_POST["cerrarSesion"]){
            echo "<p style='color:red; padding:1em;'>*Sesión cerrada*</p>";
            session_start();
            session_unset(); //Sesión cerrada vacia el objeto session
            session_destroy();
            unset($_POST); //Vacia el objeto $_POST
        }
        include("../views/registroEmpleado.php");

}
