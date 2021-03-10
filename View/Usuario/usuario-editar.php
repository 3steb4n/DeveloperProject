   <!-- Title Page-->
    <title>Usuarios</title>

    <!-- Contenido -->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"><?php echo $alm->id_usuario != null ? $alm->nombre : 'Nuevo Registro'; ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3"></div>

                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                              <li><a href="?c=Usuario">Usuarios</a> <span> /</span></li>&nbsp
                              <li class="active"><?php echo $alm->id_usuario != null ? $alm->nombre_rol : 'Nuevo Registro'; ?></li>
                            </ol>

                            <form action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_usuario" value="<?php echo $alm->id_usuario; ?>" />
                                
                                <div class="form-group">
                                    <label>Nombre(s)</label>
                                    <input type="text" name="nombres" autocomplete="off" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Nombre(s)" data-validacion-tipo="requerido|min:3" />
                                </div>

                                <div class="form-group">
                                    <label>Apellido(s)</label>
                                    <input type="text" name="apellidos" autocomplete="off" value="<?php echo $alm->apellido; ?>" class="form-control" placeholder="Apellido(s)" data-validacion-tipo="requerido|min:3" />
                                </div>

                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" name="email" autocomplete="off" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="Correo" data-validacion-tipo="requerido|min:3" />
                                </div>

                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol" class="form-control">
                                        <option value="0">-- Seleccione Rol --</option>
                                        <?php foreach($this->model3->Listar_Rol() as $r): ?>
                                        <option value="<?php echo $r->id_rol; ?>"><?php echo $r->nombre_rol; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="text" name="clave" autocomplete="off" value="<?php echo $alm->clave; ?>" class="form-control" placeholder="Contraseña" data-validacion-tipo="requerido|min:3" />
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