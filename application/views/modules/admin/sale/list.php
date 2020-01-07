<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title"><?php echo $title ?></h3>
            <a href="<?php echo base_url() ?>movimientos/ventas/add" class="btn btn-primary">
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
                    <th>N. Cliente</th>
                    <th>T. Comprobante</th>
                    <th>N. Comprobante</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $sale) : ?>
                        <tr>
                            <td><?php echo $sale->id ?></td>
                            <td><?php echo $sale->client ?></td>
                            <td><?php echo $sale->typeVoucher ?></td>
                            <td><?php echo $sale->num_voucher ?></td>
                            <td><?php echo $sale->date ?></td>
                            <td><?php echo $sale->total ?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-info m-1 btn-view-sale" data-toggle="modal" data-target="#modal-default" value="<?php echo $sale->id ?>">
                                        <i class="far fa-search nav-icon"></i>
                                    </button>
                                    <a href="<?php echo base_url(); ?>matenimiento/categoria/edit/<?php echo $sale->id ?>" class="btn btn-primary m-1">
                                        <i class="far fa-edit nav-icon"></i>
                                    </a>
                                    <a href="<?php echo base_url() ?>matenimiento/categoria/delete/<?php echo $sale->id ?>" class="btn btn-danger m-1">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>N. Cliente</th>
                    <th>T. Comprobante</th>
                    <th>N. Comprobante</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>