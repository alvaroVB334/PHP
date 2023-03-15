<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div id="enviarCorreo" style="display:none;">
        <h4>Introduce tu correo electronico para enviar la confirmación</h4>
        <form method="POST" action="../controller/recuperacionController.php">
            <input type="text" name="enviarCorreo">
            <button type="submit">Confirmar</button>
        </form>
    </div>
    <div id="correoEnviado" style="display:none;">
        <h4>Introduce el codigo que te hemos enviado al correo</h4>
        <form method="POST" action="../controller/recupCodeController.php">
            <input type="text" name="codigoMetido">
            <button type="submit">Confirmar</button>
        </form>
    </div>
    <div id="nuevaPass" style="display:none;">
        <h4>Introduce la nueva contraseña</h4>
        <form method="POST" action="../controller/recupCodeController.php">
            <input type="text" name="nuevaPass">
            <button type="submit">Confirmar</button>
        </form>
    </div>
    <script>
        //Scripts de control de status para desplegar o no los formularios correspondientes
        let status='<?php if(isset($status)) echo $status; ?>';

        if(status=='') status='enviarCorreo'; 
        console.log(status);

        if(status=='enviarCorreo'){
            document.querySelector("#enviarCorreo").style.display="block";
        }else if(status=="correoEnviado"){
            document.querySelector("#correoEnviado").style.display="block";
        }else if(status=="nuevaPass"){
            document.querySelector('#nuevaPass').style.display="block";
        }
            
        
    </script>
</body>

</html>