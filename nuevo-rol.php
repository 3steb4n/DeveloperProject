<?php 
    include('layouts/header.php');

    $idMenu          = 0;
    $PermisoActivo   = 0;
    $IdmenuHijo      = 0;
    $bandera         = 0;

    if(isset($_GET["a"]) and isset($_GET["b"]) and isset($_GET["c"]))
    {
        $idMenu         = decrypt($_GET["a"]);
        $PermisoActivo  = decrypt($_GET["b"]);
        $IdmenuHijo     = decrypt($_GET["c"]);

    }

    $PerfilesEncontrados = array();
    if($idMenu!=0 and $PermisoActivo!=0 and $IdmenuHijo!=0)
    {
        $PerfilesEncontrados = $ObjetosPermisos->BuscarPerfiles($IdmenuHijo);
    }

    if(!empty($PerfilesEncontrados))
    {
        $bandera = 1;
    }
 ?>

    <!-- Title Page-->
    <title>Roles</title>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Rol
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?php
                            if($idMenu!=0 and $PermisoActivo!=0 and $IdmenuHijo!=0)
                            {
                                if(!empty($PerfilesEncontrados))
                                {
                                    foreach ($PerfilesEncontrados as $key => $value) 
                                    {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" class="formulario">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"></h6>
                            </div>
                            <div class="card-body">
                                <div>
                                    <center>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td colspan=2>
                                                    <input type="hidden" id="txtBandera" value="<?php echo $bandera; ?>" name="txtBandera">
                                                    <input type="hidden" id="txtidMenu" value="<?php echo $idMenu; ?>" name="txtidMenu">
                                                    <input type="hidden" id="txtIdPerfil" value="<?php echo $IdmenuHijo; ?>" name="txtIdPerfil">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Descripción:</td>
                                                <td>
                                                    <input class="form-control" type="text" id="txtdescripcion" value="<?php echo $value['DESCRIPCION']; ?>" name="txtdescripcion">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Estado:</td>
                                                <td>
                                                    <select name="cbEstatus" id="cbEstatus">
                                                        <option value="0">Inactivo</option>
                                                        <option value="1">Activo</option>
                                                    </select>
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