<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Local
{


    /**
     * Función que saca todos los locales
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getLocales($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.local");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que accede a un local según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idLocal -> id del local cuya información queremos obtener
     */
    public function getLocal($conexPDO, $idLocal)
    {
        if (isset($conexPDO) && is_numeric($idLocal)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.local WHERE idLocal=?"); //Preparamos la query
                $query->bindParam(1, $idLocal); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade un local a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param local -> Local a añadir
     */
    public function addLocal($conexPDO, $local)
    {
        $result = null;

        if (isset($local) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.local(calle,ciudad,Cartelera_idCartelera) values(:calle,:ciudad,:Cartelera_idCartelera)");

                //Le asociamos los Parametros
                $query->bindParam(":calle",$local["calle"]);
                $query->bindParam(":ciudad",$local["ciudad"]);
                $query->bindParam(":Cartelera_idCartelera",$local["Cartelera_idCartelera"]);


                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina un local según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idLocal -> id del local a eliminar
     */
    public function delLocal($conexPDO, $idLocal)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idLocal)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.local WHERE idLocal=?");
                $query->bindParam(1, $idLocal);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza un Local
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param local -> Local a actualizar
     */
    public function updateLocal($conexPDO, $local)
    {
        $result = null;
        if ($conexPDO != null && isset($local) && isset($local["idLocal"]) && is_numeric($local["idLocal"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.local set calle=:calle,ciudad=:ciudad,Cartelera_idCartelera=:Cartelera_idCartelera,where idLocal=:idLocal");

                $query->bindParam(":calle",$local["calle"]);
                $query->bindParam(":ciudad",$local["ciudad"]);
                $query->bindParam(":Cartelera_idCartelera",$local["Cartelera_idCartelera"]);
                $query->bindParam(":idLocal",$local["idLocal"]);


                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
