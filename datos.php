<?php 
    include('layouts/header.php');

    $idMenu          = 0;
    $IdUsuario       = $_SESSION['USERID'];

    if(isset($_GET["a"]))
    {
        $idMenu         = decrypt($_GET["a"]);

    }

    $BuscarUsuario = array();
    
    if($idMenu!=0)
    {
        $BuscarUsuario = $ObjetosPermisos->BuscarUsuario($IdUsuario);
    }
    

 ?>

	<!-- Title Page-->
    <title>Datos</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Datos
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?php
                            if($idMenu!=0  and $IdUsuario!=0)
                            {
                                if(!empty($BuscarUsuario))
                                {
                                    foreach ($BuscarUsuario as $key => $value) 
                                    {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" class="formulario">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><?php echo $value['NOMBRE']." ".$value['APELLIDOS']; ?></h6>
                            </div>
                            <div class="card-body">
                                <div>
                                    <center>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Nombre:</td>
                                                <td>
                                                    <input class="form-control" type="text" id="txtNombre" value="<?php echo $value['NOMBRE']; ?>" name="txtNombre">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Apellidos:</td>
                                                <td>
                                                    <br>
                                                    <input class="form-control" type="text" id="txtApellidos" value="<?php echo $value['APELLIDOS']; ?>" name="txtApellidos">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan=2>
                                                    <input type="hidden" id="txtEmail" value="<?php echo $value['CORREO']; ?>" name="txtEmail">
                                                    <input type="hidden" id="cbPerfil" value="<?php echo $value['TIPO_USUARIO']; ?>" name="cbPerfil">
                                                    <input type="hidden" id="cbEstatus" value="<?php echo $value['ESTATUS']; ?>" name="cbEstatus">
                                                    <input type="hidden" id="id" value="<?php echo $IdUsuario; ?>" name="id">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan=2>
                                                    <center>
                                                        <br>
                                                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Guardar Información</button>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <?php
                                    }
                                }
                                else
                                {

                                }
                            }
                            else
                            {
                                echo "<br/>";
                                include("NoAcceso.php");
                            }
                        ?>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Content Row -->
            <div class="row"></div>

            <!-- Content Row -->
            <div class="row"></div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php 
        include('layouts/footer.php');
    ?>