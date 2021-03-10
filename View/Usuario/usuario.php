
    <!-- Title Page-->
    <title>Usuarios</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    Usuarios
                </h1>
                <a href="?c=Usuario&a=Crud" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i> Usuario
                </a>
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($this->model->Listar_Usuario() as $r): ?>
                                        <tr>
                                            <td><?php echo $r->nombre; ?></td>
                                            <td><?php echo $r->apellido; ?></td>
                                            <td><?php echo $r->correo; ?></td>
                                            <td><?php echo $r->nombre_rol; ?></td>
                                            <td>
                                                <a href="?c=Usuario&a=Crud&id_usuario=<?php echo $r->id_usuario; ?>">
                                                    <button class="btn btn-success btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                &nbsp
                                                <a href="?c=Usuario&a=Eliminar&id_usuario=<?php echo $r->id_usuario; ?>">
                                                    <button class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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