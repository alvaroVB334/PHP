<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div class="mb-3">
        <input class="form-control form-control-lg" type="text" placeholder="Introduce tu nombre" name="nombre">
          
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <?php
      
        if(isset($_POST["nombre"])){
          $nombre=$_POST["nombre"];
          $nombre=trim($nombre," "); //Elimina caracteres en blanco (u otros) al principio y al final de la cadena

          $array_char=str_split($nombre);
          $espacio=0;
          $contador_nombre=0;
          $contador_apellido1=0;
          $contador_apellido2=0;

          for($i=0;$i<count($array_char);$i++){
            
            if (strtolower($array_char[$i])=='a') { // VOCAL A
              if($espacio==1){
                $contador_apellido1++;
              }else if($espacio==2){
                $contador_apellido2++;
              }else $contador_nombre++;
            }
            if (strtolower($array_char[$i])=='e') { // VOCAL E
              if($espacio==1){
                $contador_apellido1++;
              }else if($espacio==2){
                $contador_apellido2++;
              }else $contador_nombre++;
            }
            if (strtolower($array_char[$i])=='i') { // VOCAL I
              if($espacio==1){
                $contador_apellido1++;
              }else if($espacio==2){
                $contador_apellido2++;
              }else $contador_nombre++;
            }
            if (strtolower($array_char[$i])=='o') { // VOCAL O
              if($espacio==1){
                $contador_apellido1++;
              }else if($espacio==2){
                $contador_apellido2++;
              }else $contador_nombre++;
            }
            if (strtolower($array_char[$i])=='u') { // VOCAL U
              if($espacio==1){
                $contador_apellido1++;
              }else if($espacio==2){
                $contador_apellido2++;
              }else $contador_nombre++;
            }

            if(strtolower($array_char[$i])==' '){
              if($array_char[$i+1]== ' '){ //En caso de que haya 2 espacios reiniciamos el bucle (No nos interesa que el contador de espacio guarde varios)
                continue;
              }else $espacio++; // Si hay un espacio y la siguiente es una letra entonces si, lo guardamos en el contador
            }
          }
          echo "Numero de vocales del Nombre: $contador_nombre</br>";
          echo "Numero de vocales del primer apellido: $contador_apellido1</br>";
          echo "Numero de vocales del segundo apellido: $contador_apellido2</br>";
        }
       
      ?>
</body>
</html>