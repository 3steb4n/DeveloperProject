<?php 
    include('layouts/header.php');

    $Usuarios        = array();
    $Usuarios        = $ObjetosPermisos->Usuarios();
    $Categoria        = $ObjetosPermisos->Categoria();
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
                        <form action="GuardarProducto.php" method="post">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Nuevo Producto</h6>
                            </div>
                            <div class="card-body">
                                <div>
                                    <center>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Marca:</td>
                                                <td>
                                                    <select name="cdMarca" id="cdMarca" style="width:350px;height: 30px;" required>
                                                        <option value="0">---Seleccione Marca---</option>
                                                        <?php
                                                            if(!empty($Categoria)){
                                                                foreach ($Categoria as $key => $value) 
                                                                {
                                                                    if(!empty($value['ID']))
                                                                    {
                                                                        echo "<option value='".$value['ID']."'>".$value['NOMBRE_CATEGORIA']."</option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Modelo:</td>
                                                <td>
                                                    <?php
                                                    echo $value['NOMBRE_CATEGORIA'];
                                                    //$SubCategoria        = $ObjetosPermisos->SubCategoria();
                                                    ?>
                                                    <select name="cdModelo" id="cdModelo" style="width:350px;height: 30px;" required>
                                                        <option value="0">---Seleccione Modelo---</option>
                                                        <?php
                                                            if(!empty($SubCategoria)){
                                                                foreach ($SubCategoria as $key => $value) 
                                                                {
                                                                    if(!empty($value['ID']))
                                                                    {
                                                                        echo "<option value='".$value['ID']."'>".$value['NOMBRE_CATEGORIA']."</option>";
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    </select>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Detalle del Producto:</td>
                                                <td>
                                                    <input type="email" id="txtEmail" value="" name="txtEmail" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Valor:</td>
                                                <td>
                                                    <input type="email" id="txtEmail" value="" name="txtEmail" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cantidad del Producto:</td>
                                                <td>
                                                    <input type="email" id="txtEmail" value="" name="txtEmail" style="width:350px;height: 30px;" autocomplete="off" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Imagen del Producto</td>
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