<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title"><?php echo $title ?></h3>
            <a href="<?php echo base_url(); ?>matenimiento/categoria/add" class="btn btn-primary">
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
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $Category) : ?>
                    <tr>
                        <td><?php echo $Category->id ?></td>
                        <td><?php echo $Category->name ?></td>
                        <td><?php echo $Category->description ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-info m-1 btn-view-category" data-toggle="modal" data-target="#modal-default" value="<?php echo $Category->id?>">
                                    <i class="far fa-search nav-icon"></i>
                                </button>
                                <a href="<?php echo base_url(); ?>matenimiento/categoria/edit/<?php echo $Category->id ?>" class="btn btn-primary m-1">
                                    <i class="far fa-edit nav-icon"></i>
                                </a>
                                <a href="<?php echo base_url() ?>matenimiento/categoria/delete/<?php echo $Category->id?>" class="btn btn-danger m-1">
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
                    <th>Nombre</th>
                    <th>Descripcion</th>
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