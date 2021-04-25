<?php 
    include('layouts/header.php');

    $Perfiles        = array();

    $Perfiles        = $ObjetosPermisos->Perfiles();
 ?>

    <!-- Title Page-->
    <title>Roles</title>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <img src="assets/img/regresar.png" onclick="Regresar()" style="cursor:pointer; " width="25px">
                <h1 class="h3 mb-0 text-gray-800">
                    Roles
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="GuardaPerfiles.php" method="post">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Nuevo Rol</h6>
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
                                                    <input type="text" id="txtdescripcion" value="" name="txtdescripcion" style="width:350px;height: 30px;" autocomplete="off">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Estado:</td>
                                                <td>
                                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;">
                                                       
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