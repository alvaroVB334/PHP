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
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <?php
        if(isset($_POST["nombre"])){
            $nombre=$_POST["nombre"];
            $nombre=trim($nombre); //Quitamos espacios al principio y al final
            $i=0; // Contador para el bucle
            $contador_nombre=0;
            $contador_apellido1=0;
            $contador_apellido2=0;
            $espacio=0;
            while(isset($nombre[$i])){
                if($nombre[$i]=="a" || $nombre[$i]=="A"){ //VOCAL A
                    if($espacio==1){
                        $contador_apellido1++;
                    }else if($espacio==2){
                        $contador_apellido2++;
                    }else $contador_nombre++;
                }
                if($nombre[$i]=="e" || $nombre[$i]=="E"){ //VOCAL E
                    if($espacio==1){
                        $contador_apellido1++;
                    }else if($espacio==2){
                        $contador_apellido2++;
                    }else $contador_nombre++;
                }
                if($nombre[$i]=="i" || $nombre[$i]=="I"){ //VOCAL I
                    if($espacio==1){
                        $contador_apellido1++;
                    }else if($espacio==2){
                        $contador_apellido2++;
                    }else $contador_nombre++;
                }
                if($nombre[$i]=="o" || $nombre[$i]=="O"){ //VOCAL O
                    if($espacio==1){
                        $contador_apellido1++;
                    }else if($espacio==2){
                        $contador_apellido2++;
                    }else $contador_nombre++;
                }
                if($nombre[$i]=="u" || $nombre[$i]=="U"){ //VOCAL U
                    if($espacio==1){
                        $contador_apellido1++;
                    }else if($espacio==2){
                        $contador_apellido2++;
                    }else $contador_nombre++;
                }
                if($nombre[$i]==' '){
                    if($nombre[$i+1]==' '){ //Si hay un espacio y la siguiente no es un espacio, reiniciamos bucle
                        $i++; //Aqui le sumo otra i porque el continue en el while vuelve a la evaluación de la condición y eso generaria un bucle infinito
                        continue;
                    }else $espacio++; //Si hay un espacio y la siguiente es una letra sumamos al contador de espacios
                }
                $i++;
            }
            echo "Numero de vocales del nombre: $contador_nombre</br>";
            echo "Numero de vocales del primer apellido: $contador_apellido1</br>";
            echo "Numero de vocales del segundo apellido: $contador_apellido2</br>";
        }
        
       
      ?>
</body>
</html>