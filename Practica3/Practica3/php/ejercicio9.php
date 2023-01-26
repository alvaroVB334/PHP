<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        table {
            margin: 20px;
            border: black 1px solid;
        }

        tr {
            border: black 1px solid;
        }

        td {
            border: black 1px solid;
        }

        td #marcada {
            border: black 1px solid;
            background-color: green;
        }
        header {
            height: 100%;
            background-color: black;
            color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            justify-items: center;
            padding: 10px;
        }

        header li:hover {
            background-color: #434343;
        }

        header li {
            height: 30%;
        }
    </style>
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_POST["inicio"]) || isset($_POST["catalogo"]) || isset($_POST["localizacion"]) || isset($_POST["servicios"]) || isset($_POST["contacto"]) || isset($_POST["gridCheck"])) {
        echo "<header>";

        if (isset($_POST["inicio"])) echo "<li>Inicio</li>";
        if (isset($_POST["catalogo"])) echo "<li>Catalogo</li>";
        if (isset($_POST["localizacion"])) echo "<li>Localización</li>";
        if (isset($_POST["servicios"])) echo "<li>Servicios</li>";
        if (isset($_POST["contacto"])) echo "<li>Hardware</li>";

        echo "</header>";

        // Crear array doble bucle doble
        $array_checkbox = $_POST["gridCheck"];

        $array_filas = [];
        $array_columnas = [];


        for ($i = 0; $i < count($array_checkbox); $i++) {
            $array_filas[$i] = explode(".", $array_checkbox[$i])[0];
            $array_columnas[$i] = explode(".", $array_checkbox[$i])[1];
        }

        $numeroFilas = max($array_filas); //Numero de filas
        $numeroColumnas = max($array_columnas); //Numero de columnas

        $arrayCasillasMarcadas = [];

        //Le voy colocando en las posiciones un string que marca las posiciones en las que el array ha sido marcado
        for ($i = 0; $i < count($array_filas); $i++) {
            $arrayCasillasMarcadas[$i] = $array_filas[$i] . "." . $array_columnas[$i];
        }


        echo "<table>";
        for ($i = 0; $i < $numeroFilas; $i++) {

            echo "<tr>";
            for ($j = 0; $j < $numeroColumnas; $j++) {

                $string = ($i + 1) . "." . ($j + 1); //El string evalua la fila y la columna (+1 porque los bucles empiezan en 0) 
                if (in_array($string, $arrayCasillasMarcadas)) { //Si el string de fila y columna existe en el array de casillas marcadas, entonces pintamos esa fila, sino no

                    echo "<td style='background-color: #77DD77'> Celda " . ($i + 1) . "-" . ($j + 1) . "</td>";
                } else echo "<td> Celda " . ($i + 1) . "-" . ($j + 1) . "</td>";
            }

            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>