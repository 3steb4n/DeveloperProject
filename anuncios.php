<?php 
    include('layouts/header.php'); 

    $Anuncio        = array();
    $IdMenu          = "";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Anuncio        = $ObjetosPermisos->Anuncios();
    }
 ?>

	<!-- Title Page-->
    <title>Anuncios</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Anuncios
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
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Anuncios</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <a href="Reguistrar_anuncio.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                <i class></i> REGISTRAR UN NUEVO ANUNCIO
                                                            </a>
                                    <?php
                                        if(!empty($Anuncio)){
                                    ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Marca</th>
                                                <th>Tipo de marca</th>
                                                <th>Detalle</th>
                                                <th>Valor</th>
                                                <th>Cantidad</th>
                                                <th>Foto</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Marca</th>
                                                <th>Tipo de marca</th>
                                                <th>Detalle</th>
                                                <th>Valor</th>
                                                <th>Cantidad</th>
                                                <th>Foto</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($Anuncio as $key => $value) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>";            
                                                    ?>

                                                            <a href="Ofertas_Grupos.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                <i class></i> INGRESAR
                                                            </a>
                                                    <?php
                                                    echo "</td>";
                                                    echo "<td>".$value["NOMBRE_CATEGORIA"]."</td>";
                                                    echo "<td>".$value["NOMBRE_SUBCATEGORIA"]."</td>";
                                                    echo "<td>".$value["DETALLES"]."</td>";
                                                    echo "<td>".$value["VALOR"]."</td>";
                                                    echo "<td>".$value["CANTIDAD"]."</td>";
                                                    echo "<td>"."<img src='UploadImage/".$value["Foto"]."'"." alt='imagen' width='200' height='100' />"."</td>";
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