<?php 
    include('layouts/header.php');

    $Perfiles        = array();
    $PermisosIconos  = array();
    $IdMenu          = "";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Perfiles        = $ObjetosPermisos->Perfiles();
        $PermisosIconos  = $ObjetosPermisos->iconos_menu($_SESSION['USERID'],$IdMenu);
    }

 ?>

	<!-- Title Page-->
    <title>Roles</title>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">
                    Roles
                </h1>
                <a href="rolNuevo.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i> Rol
                </a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Roles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            	<?php
				                    if(!empty($Perfiles)){
				                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($Perfiles as $key => $value) 
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
                                                echo "<td>".$value["DESCRIPCION"]."</td>";
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