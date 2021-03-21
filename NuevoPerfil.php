<?php
    session_start();
    include('class.consultas.php');
    include('clases/class.encriptar.php');
    $ObjetosPermisos = new Permisos;
    $idMenu          = 0;
    $PermisoActivo   = 0;
    $IdmenuHijo      = 0;
    $bandera         = 0;
    if(isset($_GET["a"]) and isset($_GET["b"]) and isset($_GET["c"])){
        $idMenu         = decrypt($_GET["a"]);
        $PermisoActivo  = decrypt($_GET["b"]);
        $IdmenuHijo     = decrypt($_GET["c"]);

    }
    $PerfilesEncontrados = array();
    if($idMenu!=0 and $PermisoActivo!=0 and $IdmenuHijo!=0){
        $PerfilesEncontrados = $ObjetosPermisos->BuscarPerfiles($IdmenuHijo);
    }
    if(!empty($PerfilesEncontrados)){
        $bandera = 1;
    }
 ?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <title>.: Permisos de Usuarios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ejemplo Permisos con Desarrollos PHP">
        <meta name="author" content="Ing. Manuel Cortes Crisanto">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript">
        function Regresar(){
            window.history.back();
        }
       
        </script>

    </head>

    <body>

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">Desarrollos en PHP<span class="red">.</span></a></h1>
                    </div>
                    <div class="links span8">
                        <br/>
                       Bienvenid@: <?php echo $_SESSION['USERNO']; ?> | <a href="">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <center><img src="assets/img/regresar.png" onclick="Regresar()" style="cursor:pointer; " width="50px"></center>
                 <center>
                    <?php
                    if($idMenu!=0 and $PermisoActivo!=0 and $IdmenuHijo!=0){
                        if(!empty($PerfilesEncontrados)){
                            foreach ($PerfilesEncontrados as $key => $value) {
                                # code...
                    ?>
                    
                    <div id="Mensaje2" width="200px"></div><br/>
                    <div class="register" style="width: 570px;">
                   
                    <form action="" method="post" enctype="multipart/form-data" class="formulario">
                        <h2>Editar Perfil <span class="red"><strong><?php echo $value['DESCRIPCION']; ?></strong></span></h2>
                        <table width="250px" border=0>
                            <tr>
                                <td colspan=2>
                                    <div id="Mensaje"></div><br/>
                                    <input type="hidden" id="txtBandera" value="<?php echo $bandera; ?>" name="txtBandera">
                                    <input type="hidden" id="txtidMenu" value="<?php echo $idMenu; ?>" name="txtidMenu">
                                    <input type="hidden" id="txtIdPerfil" value="<?php echo $IdmenuHijo; ?>" name="txtIdPerfil">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Descripción:</td>
                                <td><input type="text" id="txtdescripcion" value="<?php echo $value['DESCRIPCION']; ?>" name="txtdescripcion" style="width:350px;height: 30px;" ></td>
                            </tr>
                           
                            <tr>
                                <td align="right"> Estatus:</td>
                                <td>
                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;">
                                        <?php 
                                            $Status = "Activo";
                                            if($value['ESTATUS']==0){
                                                $Status="Inactivo";
                                            }
                                            echo '<option value="'.$value['ESTATUS'].'">'.$Status.'</option>';
                                        ?>
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2><button type="submit">Guardar Información</button></td>
                            </tr>


                        </table>
                        

                        
                    </form>
                    
                </div>
                    <?php
                            }
                        }else{
                            //Nuevo
                            ?>
                                <div id="Mensaje2" width="200px"></div><br/>
                    <div class="register" style="width: 570px;">
                   
                    <form action="" method="post" enctype="multipart/form-data" class="formulario">
                        <h2>Nuevo <span class="red"><strong>Perfil</strong></span></h2>
                        <table width="250px" border=0>
                            <tr>
                                <td colspan=2>
                                    <div id="Mensaje"></div><br/>
                                    <input type="hidden" id="txtBandera" value="<?php echo $bandera; ?>" name="txtBandera">
                                    <input type="hidden" id="txtidMenu" value="<?php echo $idMenu; ?>" name="txtidMenu">
                                    <input type="hidden" id="txtIdPerfil" value="<?php echo $IdmenuHijo; ?>" name="txtIdPerfil">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Descripción:</td>
                                <td><input type="text" id="txtdescripcion" value="" name="txtdescripcion" style="width:350px;height: 30px;" ></td>
                            </tr>
                           
                            <tr>
                                <td align="right"> Estatus:</td>
                                <td>
                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;">
                                       
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2><button type="submit">Guardar Información</button></td>
                            </tr>


                        </table>
                        

                        
                    </form>
                    
                </div>
                            <?php
                        }
                    }else{
                            echo "<br/>";
                            include("NoAcceso.php");
                    }
                     ?>
                  
                </center>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/jsPerfilesNuevo.js"></script>
    </body>

</html>
