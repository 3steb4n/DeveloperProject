<?php 
    include('layouts/header.php');

    $ObjetosPermisos = new Permisos;
    $idMenu          = 0;
    $PermisoActivo   = 0;
    $IdUsuario       = 0;
    $bandera         = 0;

    if(isset($_GET["a"]) and isset($_GET["b"]) and isset($_GET["c"]))
    {
        $idMenu         = decrypt($_GET["a"]);
        $PermisoActivo  = decrypt($_GET["b"]);
        $IdUsuario      = decrypt($_GET["c"]);

    }
    $BuscarUsuario = array();
    if($idMenu!=0 and $PermisoActivo!=0 and $IdUsuario!=0)
    {
        $BuscarUsuario = $ObjetosPermisos->BuscarUsuario($IdUsuario);
    }
    if(!empty($BuscarUsuario))
    {
        $bandera = 1;
    }
    $Roles  = $ObjetosPermisos->Roles();
 ?>

    <!-- Title Page-->
    <title>Usuarios</title>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Usuarios
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <?php
                        if($idMenu!=0 and $PermisoActivo!=0 and $IdUsuario!=0)
                        {
                            if(!empty($BuscarUsuario))
                            {
                                foreach ($BuscarUsuario as $key => $value) 
                                {
                                    $EstatusUsuario   = $value['estado'];
                                    $TipoUsuario      = $value['tipo_usuario'];
                    ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                    if(!empty($Usuarios)){
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Estado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <?php 
                                    }
                                    else
                                    {
                                        echo "<br/><center>";
                                        include("NoAcceso.php");
                                        echo "</center>";
                                    }
                                ?>
                            </div>
                        </div>
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
        <div class="register-container container">
            <div class="row">
                 <center>
                    <?php
                    if($idMenu!=0 and $PermisoActivo!=0 and $IdUsuario!=0)
                    {
                        if(!empty($BuscarUsuario)){
                            foreach ($BuscarUsuario as $key => $value) {
                                $EstatusUsuario   = $value['estado'];
                                $TipoUsuario      = $value['tipo_usuario'];
                    ?>
                    
                    <div id="Mensaje2" width="200px"></div><br/>
                    <div class="register" style="width: 570px;">
                   
                    <form action="" method="post" enctype="multipart/form-data" class="formulario">
                        <h2>Editar Perfil <?php echo $value['nombre']." ".$value['apellido']; ?></span></h2>
                        <table width="250px" border=0>
                            <tr>
                                <td colspan=2>
                                    <div id="Mensaje"></div><br/>
                                    <input type="hidden" id="txtBandera" value="<?php echo $bandera; ?>" name="txtBandera">
                                    <input type="hidden" id="txtidMenu" value="<?php echo $idMenu; ?>" name="txtidMenu">
                                    <input type="hidden" id="id" value="<?php echo $IdUsuario; ?>" name="id">
                                    <input type="hidden" id="control1" value="0" name="control1">
                                </td>
                            </tr>
                             <tr>
                                <td align="right">Nombres:</td>
                                <td><input type="text" id="txtNombre" value="<?php echo $value['nombre']; ?>" name="txtNombre" style="width:350px;height: 30px;" ></td>
                            </tr>

                             <tr>
                                <td align="right">Apellidos:</td>
                                <td><input type="text" id="txtApellidos" value="<?php echo $value['apellido']; ?>" name="txtApellidos" style="width:350px;height: 30px;" ></td>
                            </tr>

                            <tr>
                                <td colspan=2><input type="hidden" id="txtEmail" value="<?php echo $value['CORREO']; ?>" name="txtEmail" style="width:350px;height: 30px;" ></td>
                            </tr>

                           <tr>
                                <td align="right">Rol:</td>
                                <td>
                                    <select name="cbPerfil" id="cbPerfil" style="width:350px;height: 30px;">
                                        <option value="0">---Seleccione Rol---</option>
                                        <?php
                                            if(!empty($Roles)){
                                                foreach ($Roles as $key => $value) {
                                                    # code...
                                                    $ActivoPerfil = "";
                                                    if($TipoUsuario == $value['id_rol']){
                                                        $ActivoPerfil = "selected";
                                                    }
                                                    if($value['ESTATUS']==1){
                                                        echo "<option value='".$value['id_rol']."' ".$ActivoPerfil.">".$value['descripcion']."</option>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="right"> Estado:</td>
                                <td>
                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;">
                                        <option value="1" <?php if($EstatusUsuario==1){ echo "selected";} ?>>Activo</option>
                                        <option value="0" <?php if($EstatusUsuario==0){ echo "selected";} ?>>Inactivo</option>
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
                    <table>
                        <tr>
                            <td>
                                <div class="register" style="width: 570px;">
                   
                    <form action="" method="post" enctype="multipart/form-data" class="formulario">
                        <h2>Nuevo <span class="red"><strong>Usuario</strong></span></h2>
                        <table width="250px" border=0>
                            <tr>
                                <td colspan=2>
                                    <div id="Mensaje"></div><br/>
                                    <input type="hidden" id="txtBandera" value="<?php echo $bandera; ?>" name="txtBandera">
                                    <input type="hidden" id="txtidMenu" value="<?php echo $idMenu; ?>" name="txtidMenu">
                                    <input type="hidden" id="id" value="0" name="id">
                                    <input type="hidden" id="control1" value="0" name="control1">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Nombres:</td>
                                <td><input type="text" id="txtNombre" value="" name="txtNombre" style="width:350px;height: 30px;" ></td>
                            </tr>

                             <tr>
                                <td align="right">Apellidos:</td>
                                <td><input type="text" id="txtApellidos" value="" name="txtApellidos" style="width:350px;height: 30px;" ></td>
                            </tr>

                            <tr>
                                <td align="right">Email:</td>
                                <td><input type="text" id="txtEmail" value="" name="txtEmail" style="width:350px;height: 30px;" ></td>
                            </tr>

                           <tr>
                                <td align="right">Rol:</td>
                                <td>
                                    <select name="cbPerfil" id="cbPerfil" style="width:350px;height: 30px;">
                                        <option value="0">---Seleccione Rol---</option>
                                        <?php
                                            if(!empty($Roles)){
                                                foreach ($Roles as $key => $value) {
                                                    # code...
                                                    if($value['estado']==1){
                                                        echo "<option value='".$value['id_rol']."'>".$value['descripcion']."</option>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="right"> Estado:</td>
                                <td>
                                    <select name="cbEstatus" id="cbEstatus" style="width:350px;height: 30px;">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2><button type="submit">Guardar Información</button></td>
                            </tr>


                        </table>
                    
                    </form>
                    
                </div>

            </td>

            <td>
               &nbsp; <div id="content2" style="display:none;">Hola, soy un nuevo div!</div>
        </td>
                        </tr>
                    </table>

              
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

    <!-- Footer -->
    <?php 
        include('layouts/footer.php');
    ?>