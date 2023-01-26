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

    if (isset($_POST["listaNumeros"])) {

        $listaNumeros = $_POST["listaNumeros"];
        $listaNumeros = explode(" ", $listaNumeros); //Separamos el String por espacios

        $maximo = strval($listaNumeros[0]);
        $minimo = strval($listaNumeros[0]);

        for ($i = 0; $i < count($listaNumeros); $i++) {
            if (strval($listaNumeros[$i]) > $maximo) { //maximo
                $maximo = $listaNumeros[$i];
            } else $maximo = $maximo;

            if ($minimo > strval($listaNumeros[$i])) {
                $minimo = $listaNumeros[$i];
            } else $minimo;
        }

        echo " MAXIMO <input class='form-control form-control-lg' disabled type='text' placeholder='Aquí saldra el Maximo' name='maximo' value='$maximo'>";
        echo " MINIMO <input class='form-control form-control-lg' disabled type='text' placeholder='Aquí saldra el Maximo' name='maximo' value='$minimo'>";
    }
    ?>
</body>

</html>