<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo $title ?></h3>
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
                <?php foreach ($categorias as $categoria) : ?>
                    <tr>
                        <td><?php echo $categoria->id ?></td>
                        <td><?php echo $categoria->name ?></td>
                        <td><?php echo $categoria->description ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-info m-1">
                                    <i class="far fa-eye nav-icon"></i>
                                </a>
                                <a href="" class="btn btn-primary m-1">
                                    <i class="far fa-edit nav-icon"></i>
                                </a>
                                <a href="" class="btn btn-danger m-1">
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
</div>