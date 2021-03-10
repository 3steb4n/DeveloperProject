   <!-- Title Page-->
    <title>Roles</title>

    <!-- Contenido -->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"><?php echo $alm->id_rol != null ? $alm->nombre_rol : 'Nuevo Registro'; ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3"></div>

                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                              <li><a href="?c=Rol">Roles</a> <span> /</span></li>&nbsp
                              <li class="active"><?php echo $alm->id_rol != null ? $alm->nombre_rol : 'Nuevo Registro'; ?></li>
                            </ol>

                            <form action="?c=Rol&a=Guardar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_rol" value="<?php echo $alm->id_rol; ?>" />
                                
                                <div class="form-group">
                                    <label>Nombre Rol</label>
                                    <input type="text" name="nombre_rol" autocomplete="off" value="<?php echo $alm->nombre_rol; ?>" class="form-control" placeholder="Nombre Rol" data-validacion-tipo="requerido|min:3" />
                                </div>
                                
                                <hr />
                                
                                <div class="text-right">
                                    <button class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>

                    <div class="col-sm-6 col-lg-3"></div>

                </div> 
            </div>
        </div>
    </div>