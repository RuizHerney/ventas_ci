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
                <?php if (!empty($sales)) : ?>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-print" data-dismiss="modal">
                        <span class="fa fa-print"></span>
                        Imprimir
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>