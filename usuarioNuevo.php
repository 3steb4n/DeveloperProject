<?php 
    include('layouts/header.php');

    $Usuarios        = array();
    $Usuarios        = $ObjetosPermisos->Usuarios();
    $Perfiles        = $ObjetosPermisos->Perfiles();
 ?>

    <!-- Title Page-->
    <title>Usuarios</title>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <img src="assets/img/regresar.png" onclick="Regresar()" style="cursor:pointer; " width="25px">
                <h1 class="h3 mb-0 text-gray-800">
                    Usuarios
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="GuardaUsuarios.php" method="post">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Nuevo Usuario</h6>
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
                                                    <input type="hidden" id="id" value="0" name="id">
                                                    <input type="hidden" id="control1" value="0" name="control1">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Nombre(s):</td>
                                                <td>
                                                    <input type="text" id="txtNombre" value="" name="txtNombre" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Apellido(s):</td>
                                                <td>
                                                    <input type="text" id="txtApellidos" value="" name="txtApellidos" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Correo:</td>
                                                <td>
                                                    <input type="email" id="txtEmail" value="" name="txtEmail" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Rol:</td>
                                                <td>
                                                    <select name="cbPerfil" id="cbPerfil" style="width:350px;height: 30px;" required>
                                                        <option value="0">---Seleccione Rol---</option>
                                                        <?php
                                                            if(!empty($Perfiles)){
                                                                foreach ($Perfiles as $key => $value) 
                                                                {
                                                                    if($value['ESTATUS']==1)
                                                                    {
                                                                        echo "<option value='".$value['ID']."'>".$value['DESCRIPCION']."</option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Estado:</td>
                                                <td>
                                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;" required>
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
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