<?php

namespace model;

use \PDO;
use \PDOException;

class Utils
{


    /**
     * Funcion que se conecta a la BD y nos devuelve una conexion PDO activa
     */
    public static function conectar()
    {
        $conPDO = null;
        try {
            require_once("../global.php");
            $conPDO = new PDO("mysql:host=" . $DB_SERVER . ";dbname=" . $DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;
        } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return $conPDO;
            die();
        }
    }
    /**
     * Limpiamos el contenido de las variables
     */
    public static function limpiar_datos($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    /**
     * Funcion que genera una cadena aleatoria
     */
    public static function generar_salt($tam)
    {

        //Definimos un array de caracteres
        $letras = "abcdefghijklmnopqrstuvwxyz1234567890*-.,";

        $salt = "";
        //Vamos añadiendo $tam caracteres aleatorios a la salt
        for ($i = 0; $i < $tam; $i++) {
            $salt .= $letras[rand(0, strlen($letras) - 1)];
        }

        //devolvemos la salt
        return $salt;
    }

    //La funcion genera un codigo número de 4 digitos aleatorio
    public static function generar_codigo_activacion()
    {
        return rand(1111, 9999);
    }

    /**
     * Función que envia el correo de confirmación
     * 
     */
    public static function correo_registro($usuario)
    {
        $destinatario = $usuario["email"];
        $asunto = "Confirmación de codigo";
        $cuerpo = "Este es tu código de confirmación, recuerda que te estamos vigilando ".$usuario["codigo_act"];
        $remite = "Alvaro alvarovera33@gmail.com";
        
        $headers = "From: $remite\r\n";
        $headers .= "Reply-To: $remite\r\n";
        
        if (mail($destinatario, $asunto, $cuerpo, $headers)) {
            echo "El correo electrónico ha sido enviado.";
        } else {
            echo "Error al enviar el correo electrónico.";
        }
        
    }
}

//$util = new Utils();

//var_dump($util->conectar());

//echo Utils::limpiar_datos("<scritp ...\2>");
// $usuario["nombre"] = "Jose";
// $usuario["email"] = "vgalflo309@g.educaand.es";

// Utils::correo_registro($usuario);
    



//$util = new Utils();

//var_dump($util->conectar());