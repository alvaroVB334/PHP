<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Peliculas
{


    /**
     * Función que saca todas las peliculas
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getPeliculas($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.peliculas");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que saca una pelicula según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idEmpleado -> id de la pelicula cuya información queremos obtener
     */
    public function getPelicula($conexPDO, $idPelicula)
    {
        if (isset($conexPDO) && is_numeric($idPelicula)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.peliculas WHERE idPelicula=?"); //Preparamos la query
                $query->bindParam(1, $idPelicula); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade una Pelicula a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param empleado -> Pelicula a añadir
     */
    public function addPelicula($conexPDO, $pelicula)
    {
        $result = null;

        if (isset($pelicula) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.peliculas(nombrePelicula,fechaEstreno,director,edadMinima) values(:nombrePelicula,:fechaEstreno,:director,:edadMinima)");

                //Le asociamos los Parametros
                $query->bindParam(":nombrePelicula", $pelicula["nombrePelicula"]);
                $query->bindParam(":fechaEstreno", $pelicula["fechaEstreno"]);
                $query->bindParam(":director", $pelicula["director"]);
                $query->bindParam(":edadMinima", $pelicula["edadMinima"]);


                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina una Pelicula según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idEmpleado -> id de la Pelicula a eliminar
     */
    public function delPelicula($conexPDO, $idPelicula)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idPelicula)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.peliculas WHERE idPelicula=?");
                $query->bindParam(1, $idPelicula);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza una pelicula
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param empleados -> Pelicula a actualizar
     */
    public function updatePelicula($conexPDO, $pelicula)
    {
        $result = null;
        if ($conexPDO != null && isset($pelicula) && isset($pelicula["idPelicula"]) && is_numeric($pelicula["idPelicula"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.peliculas set nombrePelicula=:nombrePelicula,fechaEstreno=:fechaEstreno,director=:director,edadMinima=:edadMinima where idPelicula=:idPelicula");

                $query->bindParam(":nombrePelicula", $pelicula["nombrePelicula"]);
                $query->bindParam(":fechaEstreno", $pelicula["fechaEstreno"]);
                $query->bindParam(":director", $pelicula["director"]);
                $query->bindParam(":edadMinima", $pelicula["edadMinima"]);
                $query->bindParam(":idPelicula", $pelicula["idPelicula"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
