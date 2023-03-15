<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Socios
{


    /**
     * Función que saca todos los Socios
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public static function getSocios($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.socios");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que saca un socio según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idSocio -> id del socio cuya información queremos obtener
     */
    public function getSocio($conexPDO, $idSocio)
    {
        if (isset($conexPDO) && is_numeric($idSocio)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.socios WHERE idSocio=?"); //Preparamos la query
                $query->bindParam(1, $idSocio); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    public function getSociosPag($conexPDO, $offset)
    {
        if ($conexPDO != null) {
            $limit = 4;
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.socios LIMIT $limit OFFSET $offset");
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a la BD: " . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade un Socio a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param socio -> socio a añadir
     */
    public function addSocio($conexPDO, $socio)
    {
        $result = null;

        if (isset($socio) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.socios(nombreSocio,fotoSocio,apellidoSocio,Local_idLocal) values(:nombreSocio,:fotoSocio,:apellidoSocio,:Local_idLocal)");

                //Le asociamos los Parametros
                $query->bindParam(":nombreSocio", $socio["nombreSocio"]);
                $query->bindParam(":fotoSocio", $socio["fotoSocio"]);
                $query->bindParam(":apellidoSocio", $socio["apellidoSocio"]);
                $query->bindParam(":Local_idLocal", $socio["Local_idLocal"]);



                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina un socio según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idSocio -> id del Socio a eliminar
     */
    public function delSocio($conexPDO, $idSocio)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idSocio)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.socios WHERE idSocio=?");
                $query->bindParam(1, $idSocio);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza un Socio
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param socio -> Socio a actualizar
     */
    public function updateSocio($conexPDO, $socio)
    {
        $result = null;
        if ($conexPDO != null && isset($socio) && isset($socio["idSocio"]) && is_numeric($socio["idSocio"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.socios set nombreSocio=:nombreSocio,fotoSocio=:fotoSocio,apellidoSocio=:apellidoSocio,Local_idLocal=:Local_idLocal where idSocio=:idSocio");

                $query->bindParam(":nombreSocio", $socio["nombreSocio"]);
                $query->bindParam(":fotoSocio", $socio["fotoSocio"]);
                $query->bindParam(":apellidoSocio", $socio["apellidoSocio"]);
                $query->bindParam(":Local_idLocal", $socio["Local_idLocal"]);
                $query->bindParam(":idSocio", $socio["idSocio"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
