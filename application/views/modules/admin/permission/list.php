<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title"><?php echo $title ?></h3>
            <a href="<?php echo base_url(); ?>adminstrador/permisos/add" class="btn btn-primary">
                <i class="far fa-plus"></i>
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Rol</th>
                    <th>Leer</th>
                    <th>Insertar</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission) : ?>
                    <tr>
                        <td><?php echo $permission->id ?></td>
                        <td><?php echo $permission->menu ?></td>
                        <td><?php echo $permission->role ?></td>
                        <td>
                            <?php if ($permission->p_read == 0) : ?>
                                <span class="fa fa-times"></span>
                            <?php else : ?>
                                <span class="fa fa-check"></span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($permission->p_insert == 0) : ?>
                                <span class="fa fa-times"></span>
                            <?php else : ?>
                                <span class="fa fa-check"></span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($permission->p_update == 0) : ?>
                                <span class="fa fa-times"></span>
                            <?php else : ?>
                                <span class="fa fa-check"></span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($permission->p_delete == 0) : ?>
                                <span class="fa fa-times"></span>
                            <?php else : ?>
                                <span class="fa fa-check"></span>
                            <?php endif ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo base_url(); ?>adminstrador/permisos/edit/<?php echo $permission->id ?>" class="btn btn-primary m-1">
                                    <i class="far fa-edit nav-icon"></i>
                                </a>
                                <a href="<?php echo base_url() ?>adminstrador/permisos/delete/<?php echo $permission->id ?>" class="btn btn-danger m-1">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Rol</th>
                    <th>Leer</th>
                    <th>Insertar</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Imformacion de la Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>