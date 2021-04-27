<?php 
    include('layouts/header.php'); 

    $Oferta_Grupos       = array();
    $IdMenu          = "";
    $_GET['a'] = "hOr==";
    if(isset($_GET['a'])){
        $IdMenu          = decrypt($_GET['a']);
        $Oferta_Grupos   = $ObjetosPermisos->Horario_Grupo($_GET['idOferta'], 'a');
        //$Tipocurso = $ObjetosPermisos->Tipo_Curso();
    }
            
 ?>

	<!-- Title Page-->
    <title>Horario de clases</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <img src="assets/img/regresar.png" onclick="Regresar()" style="cursor:pointer; " width="25px">
                <h1 class="h3 mb-0 text-gray-800">
                    Cursos
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
                                <h6 style="text-align: center;" class="m-0 font-weight-bold text-primary">HORARIO DE CLASE: <?php echo $_GET['nombreOferta']; ?></h6>
                                <h6 style="text-align: left;">
                                    NG = Número de grupo
                                    <br>
                                    CG = Capacidad del grupo
                                    <br>
                                    HPA = Horas a programar
                                </h6>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        if(!empty($Oferta_Grupos)){
                                    ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SEM</th>
                                                <th>CURRICULO</th>
                                                <th>CURSO</th>
                                                <th>NG</th>
                                                <th>CG</th>
                                                <th>TIPO GRUPO</th>
                                                <th>PROFESOR</th>
                                                <th>HPA</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($Oferta_Grupos as $key => $value) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$value["SEMESTRE"]."</td>";
                                                    echo "<td>".$value["CURRICULO"]."</td>";
                                                    echo "<td>".$value["CURSO"]."</td>";
                                                    echo "<td>".$value["ID_GRUPO"]."</td>";
                                                    echo "<td>".$value["CAPACIDAD"]."</td>";
                                                    echo "<td>".$value["DESCRIPCION"]."</td>";
                                                    if($value["DOCENTE"]==""){echo "<td style='color: red;'> NO ASIGNADO </td>";}else{echo "<td>".$value["DOCENTE"]."</td>";}
                                                    echo "<td>"."</td>";
                                                    echo "<td>".$value["DESCRIPCION"]."</td>";
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