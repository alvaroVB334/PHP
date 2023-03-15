<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>
  <style>
    body {
      padding: 1em;
    }
  </style>
</head>

<body>
  <?php
  switch ($accion) { //Si la accion lleva el value modificar llamamos a actualizar, si lleva insertar a insertar de 0, sino volvemos a la main tabla
    case "modificar":
      $url_destino = "../controller/actualizarSocio.php";
      break;
    case "insertar":
      $url_destino = "../controller/insertarSocio.php";
      break;
    default:
      $url_destino = "../views/mainPage.php";
  }
  ?>

  <h1>Socio Data</h1>
  <form method="POST" action="<?= $url_destino ?>">

    <div class="form-group">
      <label for="formGroupExampleInput2">Nombre Socio</label>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nombre" value='<?= (isset($_POST["nombreSocio"]) ? $socio["nombreSocio"] : "") ?>' name="nombreSocio">
      <!-- if(condicion) { /* si retorna true */} 
        else { /* en caso de false */}

            (condicion) ? /* si retorna true */ 
            : /* en caso de false */ ;-->
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2">Apellido Socio</label>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Apellido" value='<?= (isset($_POST["apellidoSocio"]) ? $socio["apellidoSocio"] : "") ?>' name="apellidoSocio">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2">Foto Socio</label>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ruta de la foto" value='<?= (isset($_POST["fotoSocio"]) ? $socio["fotoSocio"] : "") ?>' name="fotoSocio">
    </div>


    <div class="form-group">
      <label for="inputState">Local del Socio</label> <!--Select de la calle del local del socioS-->
      <p style="font-size: small; color:red"><?= (isset($_POST["Local_idLocal"]) ? "Local Actual:" . $socio["Local_idLocal"] : "") ?></p>
      <select id="inputState" class="form-control" name="Local_idLocal">
        <option value="1">1. Hollow Ridge Drive</option>
        <option value="2">2. Mayfield Hill</option>
        <option value="3">3. Summer Ridge Court</option>
        <option value="4">4. Eastwood Drive</option>
        <option value="5">5. Parkside Pass</option>
        <option value="6">6. Autumn Leaf Avenue</option>
        <option value="7">7. Larry Way</option>
        <option value="8">8. Claremont Trail</option>
        <option value="9">9. Farmco Point</option>
        <option value="10">10. Sunfield Avenue</option>
      </select>
    </div>
    <br>
    <input type="hidden" name="idSocio" value='<?= (isset($socio) ? $socio["idSocio"] : "") ?>' />
    <button type="submit" name="modificar" value="true" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2">Enviar</button> <!--NO SE ENVIA ESTE MODIFICAR == TRUE ERGO LOS DATOS NO LLEGAN AL CONTROLADOR-->
  </form>
</body>

</html>