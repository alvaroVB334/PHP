<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Cartelera
{


    /**
     * Función que saca todas las carteleras
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getCarteleras($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.cartelera");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que saca una cartelera según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idCartelera -> id de la Cartelera cuya información queremos obtener
     */
    public function getCartelera($conexPDO, $idCartelera)
    {
        if (isset($conexPDO) && is_numeric($idCartelera)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.cartelera WHERE idCartelera=?"); //Preparamos la query
                $query->bindParam(1, $idCartelera); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos de de la cartelera según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añad una cartelera a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param cartelera -> Cartelera a añadir
     */
    public function addCartelera($conexPDO, $cartelera)
    {
        $result = null;

        if (isset($cartelera) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.cartelera(fechaCartelera) values(:fechaCartelera)");

                //Le asociamos los Parametros
                $query->bindParam(":fechaCartelera", $cartelera["fechaCartelera"]);

                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina una cartelera según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idCartelera -> id de la Cartelera a eliminar
     */
    public function delCartelera($conexPDO, $idCartelera)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idCartelera)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.cartelera WHERE idCartelera=?");
                $query->bindParam(1, $idCartelera);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza una cartelera
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param cartelera -> Cartelera a actualizar
     */
    public function updateCartelera($conexPDO, $cartelera)
    {
        $result = null;
        if ($conexPDO != null && isset($cartelera) && isset($cartelera["idCartelera"]) && is_numeric($cartelera["idCartelera"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.cartelera set fechaCartelera=:fechaCartelera where idCartelera=:idCartelera");

                $query->bindParam(":fechaCartelera", $cartelera["fechaCartelera"]);
                $query->bindParam(":idCartelera", $cartelera["idCartelera"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
