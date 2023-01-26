<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Formulario Cumpleaños</title>
</head>

<body>
  <form action="" method="POST">
    <div class="mb-3">
      Introduce tu nombre
      <input class="form-control form-control-lg" type="text" placeholder="Introduce tu nombre" name="nombre">
    </div>
    <div class="mb-3">
      Introduce tu cumpleaños
      <input class="form-control form-control-lg" type="text" placeholder="dia-mes-año" name="cumpleaños">
    </div>


    <div class="mb-3">
      Introduce la hora actual
      <input type="time" name="hora">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

  <?php
  date_default_timezone_set('Europe/Madrid');

  if (isset($_POST["nombre"]) && isset($_POST["cumpleaños"]) && isset($_POST["hora"])) {
    $nombre = $_POST["nombre"];
    $cumpleaños = $_POST["cumpleaños"];
    $hora = $_POST["hora"];

    crear_frase_fechas($nombre, $cumpleaños, $hora);
  }

  /**
   * Función que crea la frase 
   * @param $nombre-> Nombre de la persona
   * @param $cumpleaños-> String con el cumpleaños de la persona separado por guiones
   * @param $hora-> Hora actual
   */
  function crear_frase_fechas($nombre, $cumpleaños, $hora) //Trabajamos con los tipos de datos date y los objetos DateTime (Para la diferencia de fechas)
  {
    $cumpleaños = strtotime($cumpleaños);
    $hora_actual = new DateTime(); //Variable que almacena la hora y fecha actual
    $hora_fecha_actual = $hora_actual->format("d-m-Y h:i"); 

    $navidad = new DateTime("22-12-2022"); //Almacena cuando es navidad
    $semana_santa = new DateTime("02-04-2023 00:00"); //Almacena cuando es semana santa
    $finde_semana = "";
    $estacion = "";

    //Diferencia entre navidad, semana santa
    $diff_navidad = $hora_actual->diff($navidad);
    $diff_semana_santa = $hora_actual->diff($semana_santa);

    $cumpleD = date("d", $cumpleaños);

    if (date("N", $cumpleaños) == 6 || date("N", $cumpleaños) == 7) { //Cae o no el cumpleaños en finde semana
      $finde_semana = "";
    } else $finde_semana = " no ";

    switch (date_format($hora_actual,'m')) {
      case "01":
      case "02":
      case "03":
        $estacion = "Invierno";
        break;
      case "04":
      case "05":
      case "06":
        $estacion = "Primavera";
        break;
      case "07":
      case "08":
      case "09":
        $estacion = "Verano";
        break;
      case "10":
      case "11":
      case "12":
        $estacion = "otoño";
        break;
    }
    echo "Bienvenido $nombre, estás en $estacion
     quedan " . ($diff_navidad->days) . " días para las vacaciones de navidad y " . ($diff_semana_santa->days) . " dias " . ($diff_semana_santa->h) . " horas para
      vacaciones de semana santa de 2023. Tu cumpleaños" . $finde_semana . "cae
       en fin de semana y es el día $cumpleD de " . date("M", $cumpleaños) . " del 2023";
  }

  ?>
</body>

</html>