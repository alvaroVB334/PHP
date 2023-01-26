<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> <!--Con CSS APARTE-->
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_POST["nFilas"]) && isset($_POST["nColumnas"]) && isset($_POST["colorFondo"]) && isset($_POST["colorLetra"])) {

        /* $nFilas=$_POST["nFilas"];
        $nColumnas=$_POST["nColumnas"];*/
        /*$colorFondo = $_POST["colorFondo"];
        $colorLetra = $_POST["colorLetra"];*/

        crear_tabla($_POST["nFilas"], $_POST["nColumnas"],$_POST["colorFondo"],$_POST["colorLetra"]);

        if (isset($_POST["edad"])) {
            crearEdad();
        }
        if (isset($_POST["sexo"])) {
            crearSexo();
        }
        if(isset($_POST["observaciones"])){
            crearObservaciones(20,30);
        }
    }
    /**
     * Función para crear una tabla
     * @param $nFilas -> Número de Filas de la tabla
     * @param $nColumnas -> Número de Columnas de la tabla
     */
    function crear_tabla($nFilas, $nColumnas,$colorF,$colorL)
    {

        echo "<table class='$colorF'>"; // TABLA
        for ($i = 0; $i < $nFilas; $i++) {
            echo "<tr class='$colorL'>";
            for ($j = 0; $j < $nColumnas; $j++) {
                echo "<td>Celda " . ($i + 1) . "-" . ($j + 1) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table></br>";
    }

    /**
     * Función que crea el select de edad en caso de que se marque la casilla
     * en el formulario
     */
    function crearEdad()
    {
        echo "Edad:<select>";
        for ($i = 1; $i <= 121; $i++) {
            echo "<option value='edad$i'>$i</option>";
        }
        echo "</select></br>";
    }
    /**
     * Función que crea los radioButton del sexo en caso de que se marque la casilla
     * en el formulario
     */
    function crearSexo()
    {
        echo "</br><fieldset>";
        echo "<legend>Selecciona el sexo</legend>";
        echo "<input type='radio' id='M' value='Masculino' name='sexo' checked>";
        echo "<label for='M'>Masculino</label>";
        echo "<input type='radio' id='F' value='Femenino' name='sexo'>";
        echo "<label for='F'>Femenino</label>";
        echo "</fieldset></br>";
    }

    /**
     * Función que crea el textArea de observaciones
     */
    function crearObservaciones($ancho,$largo){
        echo "</br><label for='observaciones'>Observaciones: </label></br>";
        echo "<textarea name='textarea' rows='$ancho' cols='$largo' placeholder='Escribe tus observaciones'>Observaciones</textarea>";
    }
    ?>
</body>

</html>