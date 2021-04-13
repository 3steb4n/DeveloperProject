<?php 
    include('layouts/header.php'); 

    $Oferta        = array();
    $IdMenu          = "";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Oferta        = $ObjetosPermisos->Oferta();
    }
 ?>

	<!-- Title Page-->
    <title>Oferta Academica</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Grupos
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="" method="post" enctype="multipart/form-data" class="formulario">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Grupos</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        if(!empty($Oferta)){
                                    ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Programa</th>
                                                <th>Currículo</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Programa</th>
                                                <th>Currículo</th>
                                                <th>Estado</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($Oferta as $key => $value) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>";            
                                                    ?>

                                                            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                <i class></i> INGRESAR
                                                            </a>
                                                    <?php
                                                    echo "</td>";
                                                    echo "<td>".$value["DESCRIPCION"]."</td>";
                                                    echo "<td>".$value["CURRICULO"]."</td>";
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