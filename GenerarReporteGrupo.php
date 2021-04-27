<?php 
    include('layouts/header.php'); 

    $Oferta        = array();
    $IdMenu          = "";
    $_GET['a'] = "hOrReGe==";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Oferta        = $ObjetosPermisos->Horario_Grupo($_GET['idOferta'], 'b');
    }
 ?>
    <!-- Title Page-->
    <title>Generar reporte - Grupo</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    REPORTE HORARIO PROGRAMA - <?php echo $_GET['nombreOferta']; ?>
                </h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <form action="" method="post" enctype="multipart/form-data" class="formulario">
                            <div style="text-align: center;" class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        if(!empty($Oferta)){
                                    ?>
                                    <label>Elija el semestre</label>
                                    <select name="Semestres">
                                    	<option>-Todos los semestres-</option>
                                            <?php foreach ($Oferta as $key => $value) 
                                                {
                                                	?>
                                                	<option><?php echo $value['SEMESTRE']; ?></option>
                                                	
                                                	<?php
                                                }
                                            ?>
                                    </select>                                                    
                                    <a href="HorarioGrupoReporte.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    	<i></i> CONSULTAR
                                    </a>
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