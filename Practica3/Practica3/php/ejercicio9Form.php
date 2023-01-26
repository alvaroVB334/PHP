<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Formulario Checkbox</title>
    <style>
        #box {
            padding: 10px;
            margin: 10px;

        }

        .gridCheckBox {
            margin: 20px;
            display: grid;
            grid-template-columns: 1% 1% 1% 1% 1% 1% 1% 1%;
            grid-template-rows: 7% 7% 7% 7% 7% 7% 7% 7%;
        }
    </style>
</head>

<body>
    <div id="box">
        <form action="ejercicio9.php" method="POST">
            <div class="form-check">
                <!--INICIO-->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="inicio">
                <label class="form-check-label" for="flexCheckDefault">
                    Inicio
                </label>
            </div>
            <div class="form-check">
                <!--CATALOGO-->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="catalogo">
                <label class="form-check-label" for="flexCheckDefault">
                    Catalogo
                </label>
            </div>
            <div class="form-check">
                <!--LOCALIZACIÓN-->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="localizacion">
                <label class="form-check-label" for="flexCheckDefault">
                    Localización
                </label>
            </div>
            <div class="form-check">
                <!--SERVICIOS-->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="servicios">
                <label class="form-check-label" for="flexCheckDefault">
                    Servicios
                </label>
            </div>
            <div class="form-check">
                <!--CONTACTO-->
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="contacto">
                <label class="form-check-label" for="flexCheckDefault">
                    Contacto
                </label>
            </div>



            <br>
        </div>
        <!--Grid de Checkboxs-->
        <h3>El Increible grid de 64 Checkboxs</h3>
        <div class="gridCheckBox">
            <?php for ($i = 1; $i < 9; $i++) {
                for ($j = 1; $j < 9; $j++) {
                    echo "<label><input type='checkbox' value='$i.$j' name='gridCheck[]'></label>";
                }
            }
            ?>
        </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    
</body>

</html>