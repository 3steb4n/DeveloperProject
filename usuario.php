<?php 
    include('layouts/header.php');

    $Usuarios        = array();
    $PermisosIconos  = array();
    $IdMenu          = "";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Usuarios        = $ObjetosPermisos->Usuarios();
        $PermisosIconos  = $ObjetosPermisos->iconos_menu($_SESSION['USERID'],$IdMenu);
    }

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
                <form name="formularios" id="formularios">
                    <input type="hidden" name="control" id="control" value="<?php echo encrypt($IdMenu)."|".encrypt(999999)."|".encrypt(999999); ?>">
                </form>

                <input type="button" name="nuevo" value="Usuario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="Control('<?php echo encrypt($IdMenu)."|".encrypt(999999)."|".encrypt(999999); ?>')"/>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
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
                                        <?php foreach ($Usuarios as $key => $value) 
                                            {
                                                $IdMenuHijo     = encrypt($value["ID"]);
                                                echo "<tr>";
                                                echo "<td>";

                                                    if(!empty($PermisosIconos))
                                                    {
                                                        foreach ($PermisosIconos as $key => $icon) 
                                                        {
                                                            $IdImagen  = "editar";
                                                            $IdIcono   = trim($icon["ID"]);
                                                            $IdIcono   = encrypt($IdIcono);
                                                            if(trim($icon["DESCRIPCION"])=="Eliminar")
                                                            {
                                                                $IdImagen = "eliminar";
                                                            }
                                                            if(trim($icon["DESCRIPCION"])=="Modificar")
                                                            {
                                                                $IdImagen = "modificar";
                                                            }
                                                ?>

                                                        <img  name="<?php echo $IdImagen; ?>" onclick="Control('<?php echo encrypt($IdMenu)."|".$IdIcono."|".$IdMenuHijo; ?>')" id="<?php echo $IdImagen; ?>" src="<?php echo $icon['IMAGEN']; ?>" title="<?php $icon['DESCRIPCION']; ?>" style="cursor:pointer;" width="30" height="30">
                                                <?php
                                                        }
                                                    }

                                                echo "</td>";
                                                echo "<td>".$value["NOMBRE"]." ".$value["APELLIDOS"]."</td>";
                                                echo "<td>".$value["CORREO"]."</td>";
                                                echo "<td>".$value["USUARIO"]."</td>";
                                                echo "<td>".$value["PASSWORD"]."</td>";
                                                echo "<td>";
                                                if($value["ESTATUS"]==1){echo "Activo";}else{echo "Inactivo";}
                                                echo "</td>";
                                                echo "</tr>";
                                        }
                                     ?>
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

    <!-- Footer -->
    <?php 
        include('layouts/footer.php');
    ?>