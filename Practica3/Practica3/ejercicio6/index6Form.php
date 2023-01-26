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
    <form action="ejercicio6-2.php" method="POST">

        <div class="mb-3">
            <!--Filas-->
            <input class="form-control form-control-lg" type="text" placeholder="Número de filas" name="nFilas">
        </div>
        <div class="mb-3">
            <!--Columnas-->
            <input class="form-control form-control-lg" type="text" placeholder="Número de columnas" name="nColumnas">
        </div>

        <div class="form-group">
            <!--Color de fondo-->
            <label for="exampleFormControlSelect1">Color de Fondo</label>
            <select class="form-control" id="exampleFormControlSelect1" name="colorFondo">
                <option>red</option>
                <option>green</option>
                <option>blue</option>
                <option>pink</option>
                <option>beige</option>
            </select>
        </div>
        <div class="form-group">
            <!--Color de letra-->
            <label for="exampleFormControlSelect1">Color de Fondo</label>
            <select class="form-control" id="exampleFormControlSelect1" name="colorLetra">
                <option>Black</option>
                <option>white</option>
                <option>yellow</option>
                <option>brown</option>
                <option>gray</option>
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="edad">
            <label class="form-check-label" for="flexCheckDefault">
                Edad
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="sexo">
            <label class="form-check-label" for="flexCheckDefault">
                Sexo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="observaciones">
            <label class="form-check-label" for="flexCheckDefault">
                Observaciones
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>

</html>