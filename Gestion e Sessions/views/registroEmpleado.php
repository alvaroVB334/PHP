<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styleRegistro.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--JQUERY y LIBRERIA DE VALIDACIÓN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <title>Registro Empleado</title>
</head>

<body>

    <script>
        $(function() {

            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>
    <?php
    $url_destino = "../controller/registroEmpleado.php";
    ?>
    <h1 style="text-align: center;">Empleados</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Iniciar sesión</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Regístrate ahora</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="../controller/inicioSesion.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Recordarme</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar sesión">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="../views/recuperarPassView.php" tabindex="5" class="forgot-password">¿Has olvidado tu contraseña?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- REGISTRO -->
                                <form id="register-form" action="<?= $url_destino ?>" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombre" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="apellido" id="apellido" tabindex="1" class="form-control" placeholder="Apellido" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="dni" id="dni" tabindex="1" class="form-control" placeholder="DNI" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="local">Selecciona tu local</label>
                                        <select class="form-control" id="local" name="local" required>
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
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo electronico" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar contraseña" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Crear cuenta">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#register-form").validate();
        });
    </script>

</body>

</html>