<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Salas
{


    /**
     * Función que saca todas las Salas
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getSalas($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.salas");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que saca una Sala según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idSala -> id de la sala cuya información queremos obtener
     */
    public function getSala($conexPDO, $idSala)
    {
        if (isset($conexPDO) && is_numeric($idSala)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.salas WHERE idSala=?"); //Preparamos la query
                $query->bindParam(1, $idSala); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade una Sala a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param sala -> Sala a añadir
     */
    public function addSala($conexPDO, $sala)
    {
        $result = null;

        if (isset($sala) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.salas(capacidadMaxima,nFilas,idLocal) values(:capacidadMaxima,:nFilas,:idLocal)");

                //Le asociamos los Parametros
                $query->bindParam(":capacidadMaxima", $sala["capacidadMaxima"]);
                $query->bindParam(":nFilas", $sala["nFilas"]);
                $query->bindParam(":idLocal", $sala["idLocal"]);


                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina una sala según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idSala -> id de la sala a eliminar
     */
    public function delLocal($conexPDO, $idSala)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idSala)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.salas WHERE idSala=?");
                $query->bindParam(1, $idSala);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza una Sala
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param sala -> Ssala a actualizar
     */
    public function updateSala($conexPDO, $sala)
    {
        $result = null;
        if ($conexPDO != null && isset($sala) && isset($sala["idSala"]) && is_numeric($sala["idSala"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.salas set capacidadMaxima=:capacidadMaxima,nFilas=:nFilas,idLocal=:idLocal where idSala=:idSala");

                $query->bindParam(":capacidadMaxima", $sala["capacidadMaxima"]);
                $query->bindParam(":nFilas", $sala["nFilas"]);
                $query->bindParam(":idLocal", $sala["idLocal"]);
                $query->bindParam(":idSala", $sala["idSala"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
