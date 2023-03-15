<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <title>Tabla Socios</title>
  <style>
    body {
      padding: 1em;

    }

    select {
      margin-bottom: 0.5em;
    }

    button {
      margin-bottom: 0.5em;
    }
    li { 
      cursor: pointer;
     }
  </style>
</head>

<body>
  <script>
    function cerrarAviso() {
      console.log("pulsando");
      document.querySelector('#aviso').style.display = "none";
    }
  </script>

  <h1 id="titulo" style="text-align: center;"><b>SOCIOS</b></h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" style="background-color: gray;">Id Socio</th>
        <th scope="col" style="background-color: gray;">Nombre</th>
        <th scope="col" style="background-color: gray;">Apellido</th>
        <th scope="col" style="background-color: gray;">id Local</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($datosEnviar); $i++): ?>
          <tr>
          <td scope=row><?= $datosEnviar[$i]["idSocio"]; ?></td>
          <td scope=row><a href='#infoDetalle' id='<?= $datosEnviar[$i]["idSocio"]; ?>' class='enlace'><?= $datosEnviar[$i]["nombreSocio"]; ?></a></td>
          <td scope=row><?= $datosEnviar[$i]["apellidoSocio"]; ?></td>
          <td scope=row><?= $datosEnviar[$i]["Local_idLocal"]; ?></td>
          <td>
            <form method='POST' action='../controller/eliminarSocio.php'>
              <input type='hidden' name='idSocio' value='<?= $datosEnviar[$i]["idSocio"]; ?>'/>
              <button class='btn btn-danger'>Eliminar</button>
            </form>
          </td>
          <td>
            <form method='POST' action='../controller/actualizarSocio.php'>
              <input type='hidden' name='idSocio' value='<?= $datosEnviar[$i]["idSocio"]; ?>'/>
              <input type='hidden' name='nombreSocio' value='<?= $datosEnviar[$i]["nombreSocio"]; ?>'/>
              <input type='hidden' name='fotoSocio' value='<?= $datosEnviar[$i]["fotoSocio"]; ?>'/>
              <input type='hidden' name='apellidoSocio' value='<?= $datosEnviar[$i]["apellidoSocio"]; ?>'/>
              <input type='hidden' name='Local_idLocal' value='<?= $datosEnviar[$i]["Local_idLocal"]; ?>'/>
              <button name='modificar' value='false' class='btn btn-primary'>Modificar</button>
            </form>
          </td>
          </tr>
          <?php endfor; ?>
    </tbody>
  </table>
  <?php
  print("<form method='POST' action='../controller/insertarSocio.php'>");
  print("<button class='btn btn-success'>Insertar Socio</button>");
  print("</form>");
  ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php  //Crea los botones de paginación según la cantidad de datos que se hayan recibido
      if (is_float(count($datosTotales) / 4)) {
        $numPag = floor(count($datosTotales) / 4) + 1;
      } else {
        $numPag = count($datosTotales) / 4;
      }
  
      for ($i = 0; $i < $numPag; $i++) {
        echo " <form id='formPag$i' method='POST' action='../controller/mostrarTabla.php'>
                <li class='page-item' onclick='formPag$i.submit();'>
                <input type='hidden' name='page' value='$i'>
                <a class='page-link'>$i</a>
                </li>
                </form>
                ";
      }
      ?>
    </ul>
  </nav>

  <div class="alert alert-success" id="aviso" role="alert" style="display:block;">
    <button type="button" class="close" id="btnAviso" style="float:left; background-color:transparent; border:none;" data-dismiss="alert" aria-label="Close" onclick="cerrarAviso()">X</button>
    <?php echo $mensaje ?>
  </div>
  <div class="infoDetalle">

  </div>
  <a name="infoDetalle" id="infoDetalle"></a>

  <?php //Alert con mensaje
  if (isset($mensaje)) {
    echo "<script>document.querySelector('#aviso').style.display='block';</script>";
  } else echo "<script>document.querySelector('#aviso').style.display='none';</script>";
  ?>

  <script>
    //Dentro de cada enlace sacamos la id que estamos pulsando y se lo mandamos a la función encargada de hacer el detalle
    document.querySelectorAll(".enlace").forEach(el => { //Seleccionamos todos los elementos con la clase enlace
      el.addEventListener("click", e => { //Vemos cual se pulsa

        let id = e.target.getAttribute("id"); //Sacamos su id
        console.log("id:::::::::::" + id)
        sendRequest(id);
      });
    });
  </script>


  <!-- SCRIPT DE DETALLE ***************************************************** -->
  <script>
    /**
     * Función encargada de hacer la petición asincrona con AJAX para mostrar el detalle de cada socio
     */
    function sendRequest(id) {
      console.log("Pulsado el id " + id);

      var theObject = new XMLHttpRequest();

      theObject.open('POST', '../controller/detailController.php', true);
      theObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      theObject.onreadystatechange = function(id) {

        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          let socio=JSON.parse(theObject.responseText); //Aqui estan los datos del socio enviados, ahora los insertaremos al DOM
          
          let text=`"<div class='container'>
    <div class='row'>
        <div class='col-md-5'>
            <div class='project-info-box mt-0'>
                <h5>Información sobre socio con id: ${socio.idSocio} </h5>
                <p class='mb-0'>Información relativa sobre los socios de la cadena de cine, y su local de asociación</p>
            </div><!-- / project-info-box -->

            <div class='project-info-box'>
                <p><b>Nombre: </b>${socio.nombreSocio}</p>
                <p><b>Apellido:</b>${socio.apellidoSocio}</p>
                 <p><b>Información de su local:</b></p>
                 <ul> 
                   <li><b>Id Local: </b>${socio.Local_idLocal}</li> 
                   <li><b>Calle: </b>${socio.calleLocal}</li> 
                   <li><b>Ciudad: </b>${socio.ciudadLocal}</li> 
                  </ul>
            </div><!-- / project-info-box -->

            <div class='project-info-box mt-0 mb-0'>
                <p class='mb-0'>
                    <span class='fw-bold mr-10 va-middle hide-mobile'>Share:</span>
                    <a href='#x' class='btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0'><i class='fab fa-facebook-f'></i></a>
                    <a href='#x' class='btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0'><i class='fab fa-twitter'></i></a>
                    <a href='#x' class='btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0'><i class='fab fa-pinterest'></i></a>
                    <a href='#x' class='btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0'><i class='fab fa-linkedin-in'></i></a>
                </p>
            </div><!-- / project-info-box -->
        </div><!-- / column -->

        <div class='col-md-3'>
            <img src='${socio.fotoSocio}' width='100px' heigth='100px' alt='project-image' class='rounded' >
            <div class='project-info-box'>
                <p><b>Categories:</b> Socios</p>
            </div><!-- / project-info-box -->
        </div><!-- / column -->
    </div>
</div>`;

          document.querySelector('.infoDetalle').innerHTML = text;
        }
      }
      theObject.send(`id=${id}`);
    }
  </script>
</body>

</html>