<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio5Php</title>
</head>

<body>
    <form action="" method="POST">
        <div class="mb-3">
            <input class="form-control form-control-lg" type="text" placeholder="Introduce la serie de numeros" name="listaNumeros">

        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    error_reporting(0); //jeje 

    if (isset($_POST["listaNumeros"])) {

        $lista_numeros = $_POST["listaNumeros"];
        $maximo = PHP_INT_MIN; //Variables locales de PHP de maximo y minimo
        $minimo = PHP_INT_MAX;
        $numero_actual = ""; //Variable que guardara el numero

        $i = 0;

        while (isset($lista_numeros[$i])) {

            if ($lista_numeros[$i] != ' ') {

                $numero_actual = $numero_actual . $lista_numeros[$i]; //Lo concatenamos a la cadena y vamos evaluando
                if ($lista_numeros[$i + 1] != ' ') {
                    $i++;
                    continue;
                }

                if ($numero_actual > $maximo) {
                    $maximo = $numero_actual;
                }

                if ($numero_actual < $minimo) {
                    $minimo = $numero_actual;
                }
            }
            $numero_actual = ""; //Limpiamos la cadena
            $i++;
        }
        //Lo repetimos otra vez fuera del bucle para que coja el ultimo número
        if ($numero_actual > $maximo) {
            $maximo = $numero_actual;
        }

        if ($numero_actual < $minimo) {
            $minimo = $numero_actual;
        }

        echo " MAXIMO <input class='form-control form-control-lg' disabled type='text' placeholder='Aquí saldra el Maximo' name='maximo' value='$maximo'>";
        echo " MINIMO <input class='form-control form-control-lg' disabled type='text' placeholder='Aquí saldra el Minimo' name='maximo' value='$minimo'>";
    }
    ?>
</body>

</html>