<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title Page-->
    <title>Inicio de Sesión</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icono -->
    <link rel="icon" type="image/png" href="assets/bootstrap/img/login.png"/>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/vendor/animate/animate.css"> 
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/login/css/main.css">
</head>
<body>
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/bootstrap/img/login.png">
                </div>

                <form class="login100-form validate-form" method="post" action="login.php">
                    <span class="login100-form-title">
                        Inicio de Sesión
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Usuario es requerido">
                        <input class="input100" type="text" id="usuario_login" name="usuario_login" placeholder="Usuario" autocomplete="off" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <br>

                    <div class="wrap-input100 validate-input" data-validate = "Contraseña es requerida">
                        <input class="input100" type="password" id="password_login" name="password_login" placeholder="Contraseña" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Ingresar
                        </button>
                    </div>

                    <div class="text-center p-t-12"></div>

                    <div class="text-center p-t-136"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap/login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/bootstrap/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/login/vendor/select2/select2.min.js"></script>
    <script src="assets/bootstrap/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="assets/bootstrap/login/js/main.js"></script>

</body>
</html>