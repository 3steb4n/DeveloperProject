<?php
    session_start();
    include('class.consultas.php');
    include('clases/class.encriptar.php');

    $ObjetosPermisos = new Permisos;
    $menuPrincipal   = $ObjetosPermisos->Menu($_SESSION['USERID']);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="assets/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Icono -->
    <link rel="icon" type="image/png" href="assets/bootstrap/img/login.png"/>

    <script type="text/javascript">

        function Control(valor)
        {
            document.formularios.control.value=valor;
        }
        
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="principal.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Módulos
            </div>

            <?php
                if(!empty($menuPrincipal))
                {
                    $cuantos=0;
                        foreach($menuPrincipal as $CrearMenu)
                        {
                            if($cuantos==0)
                            {
                                echo '<li class="nav-item">';
                            }

                            $cuantos ++;
                            $idUrl  = encrypt($CrearMenu["ID"]);
                            $Style  = encrypt($CrearMenu["DESCRIPCION"]);

                            echo '<center><a class="nav-link" href="'.$CrearMenu["URL"].'?a='.$idUrl.'&b='.$Style.'">';
                            echo '<img src="'.$CrearMenu["IMAGEN"].'" width="20px" height="20px">&nbsp';
                            echo '<span>'.$CrearMenu["DESCRIPCION"].'</span></a></center>';

                            if($cuantos==3)
                            {
                                $cuantos=0;
                                echo '</li>';
                            }
                        }
                }
                else
                {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link">';
                    echo '<img src="assets/img/menu/alerta.png" width="20px" height="20px">';
                    echo '<span>Sin Permisos para el ver Menú</span></a>';
                    echo '</li>';
                }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <center>
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </center>
            </div>


        </ul>
        <!-- End of Sidebar -->