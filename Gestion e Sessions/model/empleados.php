<?php

namespace model;

require_once("utils.php");

use \PDO;
use \PDOException;

class Empleados
{
    public function getEmpleadoByEmail($conexPDO,$email){
        try {
            $query=$conexPDO->prepare("SELECT * FROM mydb.empleados where email =?");
            $query->bindParam(1,$email);
            $query->execute();

            return $query->fetch();
        } catch (PDOException $e) {
            print("Error al acceder a la BD ".$e->getMessage());
        }
    }

    public function getCountEmpleados($conexPDO){

        try {
            $query = $conexPDO->prepare("SELECT * FROM mydb.empleados");
            $query->execute();
            return count($query->fetchAll());

        } catch (PDOException $e) {
            print("Error al acceder a la BD ".$e->getMessage());
        }
    }
    /**
     * Función que saca todos los empleados
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     */
    public function getEmpleados($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Introducimos la sentencia con prepared statement y luego ponemos los valores
                $query = $conexPDO->prepare("SELECT * FROM mydb.empleados");

                $query->execute(); // Ejecutamos sentencia
                return $query->fetchAll(); //Devolvemos los datos al cliente
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que a un empleado según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idEmpleado -> id del empleado cuya información queremos obtener
     */
    public function getEmpleado($conexPDO, $idEmpleado)
    {
        if (isset($conexPDO) && is_numeric($idEmpleado)) {
            try {
                $query = $conexPDO->prepare("SELECT * FROM mydb.empleados WHERE idEmpleados=?"); //Preparamos la query
                $query->bindParam(1, $idEmpleado); //Asigamos la interrogación a el valor en concreto

                $query->execute();
                return $query->fetch(); //Devolvemos los datos según la ID introducida
            } catch (PDOException $e) {
                print("Error al acceder a la BD" . $e->getMessage());
            }
        }
    }
    /**
     * Función que añade un empleado a la BD
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param empleado -> Empleado a añadir
     */
    public function addEmpleado($conexPDO, $empleado)
    {
        $result = null;

        if (isset($empleado) && $conexPDO != null) {
            try {
                //Preparamos sentencia
                $query = $conexPDO->prepare("INSERT INTO mydb.empleados(idEmpleados,nombreEmpleado,apellidosEmpleado,dni,Local_idLocal,email,password,salt,codigo_act,activo) values(:idEmpleados,:nombreEmpleado,:apellidosEmpleado,:dni,:Local_idLocal,:email,:password,:salt,:codigo_act,:activo)");

                //Le asociamos los Parametros

                $query->bindParam(":idEmpleados", $empleado["idEmpleados"]);
                $query->bindParam(":nombreEmpleado", $empleado["nombreEmpleado"]);
                $query->bindParam(":apellidosEmpleado", $empleado["apellidosEmpleado"]);
                $query->bindParam(":dni", $empleado["dni"]);
                $query->bindParam(":Local_idLocal", $empleado["Local_idLocal"]);
                $query->bindParam(":email", $empleado["email"]);
                $query->bindParam(":password", $empleado["password"]);
                $query->bindParam(":salt", $empleado["salt"]);
                $query->bindParam(":codigo_act", $empleado["codigo_act"]);
                $query->bindParam(":activo",$empleado["activo"]);
                


                //Ejecutamos
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }

            return $result;
        }
    }

    /**
     * Función que elimina un empleado según su id
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param idEmpleado -> id del Empleado a eliminar
     */
    public function delEmpleado($conexPDO, $idEmpleado)
    {
        $result = null;
        if ($conexPDO != null && is_numeric($idEmpleado)) {
            try {
                $query = $conexPDO->prepare("DELETE FROM mydb.empleados WHERE idEmpleados=?");
                $query->bindParam(1, $idEmpleado);
                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }
        return $result;
    }

    /**
     * Función que actualiza a un empleado
     * @param conexPDO -> Objeto de Conexión a Bases de datos
     * @param empleados -> Empleado a actualizar
     */
    public function updateEmpleado($conexPDO, $empleado)
    {
        $result = null;
        if ($conexPDO != null && isset($empleado["idEmpleados"]) && is_numeric($empleado["idEmpleados"])) {
            try {
                $query = $conexPDO->prepare("UPDATE mydb.empleados set nombreEmpleado=:nombreEmpleado,apellidosEmpleado=:apellidosEmpleado,dni=:dni,Local_idLocal=:Local_idLocal,email=:email,password=:password,salt=:salt,codigo_act=:codigo_act,activo=:activo where idEmpleados=:idEmpleados");

                $query->bindParam(":nombreEmpleado", $empleado["nombreEmpleado"]);
                $query->bindParam(":apellidosEmpleado", $empleado["apellidosEmpleado"]);
                $query->bindParam(":dni", $empleado["dni"]);
                $query->bindParam(":Local_idLocal", $empleado["Local_idLocal"]);
                $query->bindParam(":email",$empleado["email"]);
                $query->bindParam(":password",$empleado["password"]);
                $query->bindParam(":salt",$empleado["salt"]);
                $query->bindParam(":codigo_act",$empleado["codigo_act"]);
                $query->bindParam(":activo",$empleado["activo"]);
                $query->bindParam(":idEmpleados", $empleado["idEmpleados"]);

                $result = $query->execute();
            } catch (PDOException $e) {
                print("Error al conectar a la BD " . $e->getMessage());
            }
        }else{
            echo "no entro!!!";
        }
        return $result;
    }
}
