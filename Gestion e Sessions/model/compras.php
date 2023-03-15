<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Compras
{


    /**
     * Función que saca todas las compras
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getCompras($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.compras");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que saca una compra según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idCompra -> id de la Compra cuya información queremos obtener
     */
    public function getCompra($conexPDO, $idCompra)
    {
        if (isset($conexPDO) && is_numeric($idCompra)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.compras WHERE idCompra=?"); //Preparamos la query
                $query->bindParam(1, $idCompra); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos de de la Compra según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade una compra a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param compra -> Compra a añadir
     */
    public function addCompra($conexPDO, $compra)
    {
        $result = null;

        if (isset($compra) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.compras(fechaCompra,tipoProducto,Local_idLocal) values(:fechaCompra,:tipoProducto,:Local_idLocal)");

                //Le asociamos los Parametros
                $query->bindParam(":fechaCompra", $compra["fechaCompra"]);
                $query->bindParam(":tipoProducto", $compra["tipoProducto"]);
                $query->bindParam(":Local_idLocal", $compra["Local_idLocal"]);

                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina una compra según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idCompra -> id de la Compra a eliminar
     */
    public function delCompra($conexPDO, $idCompra)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idCompra)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.compras WHERE idCompra=?");
                $query->bindParam(1, $idCompra);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza una compra
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param compra -> compra a actualizar
     */
    public function updateCompra($conexPDO, $compra)
    {
        $result = null;
        if ($conexPDO != null && isset($compra) && isset($compra["idCompra"]) && is_numeric($compra["idCompra"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.compras set fechaCompra=:fechaCompra,tipoProducto=:tipoProducto,Local_idLocal=:Local_idLocal where idCompra=:idCompra");

                $query->bindParam(":fechaCompra", $compra["fechaCompra"]);
                $query->bindParam(":tipoProducto", $compra["tipoProducto"]);
                $query->bindParam(":Local_idLocal", $compra["Local_idLocal"]);
                $query->bindParam(":idCompra", $compra["idCompra"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }
}
