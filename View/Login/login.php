<?php
    session_start();
?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="https://static.zerochan.net/Gawr.Gura.full.3075738.png">
                </div>

                <form class="login100-form validate-form" method="post" action="?c=Login&a=Validar">
                    <span class="login100-form-title">
                        Inicio de Sesión
                    </span>

                    <font color="#FF0801">
                            <?php 
                                if (isset($alerta_c)) 
                                {
                                    echo $alerta_c;
                                }
                            ?>
                    </font>

                    <div class="wrap-input100 validate-input" data-validate = "Correo electrónico es requerido">
                        <input class="input100" type="email" name="email" placeholder="Correo electrónico" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <br>

                    <div class="wrap-input100 validate-input" data-validate = "Contraseña es requerida">
                        <input class="input100" type="password" name="pass" placeholder="Contraseña" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <font color="#FF0801">
                            <?php 
                                if (isset($alerta_p)) 
                                {
                                    echo $alerta_p;
                                }
                            ?>
                    </font>
                    
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