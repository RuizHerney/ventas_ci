<div class="box box-solid">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <form action="<?php echo base_url(); ?>movimientos/ventas/store" method="POST" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Comprobante:</label>
                            <select name="voucher" id="voucher" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <?php foreach ($vouchers as $voucher) : ?>

                                    <?php
                                    $dataVoucher = $voucher->id . '*' . $voucher->quantity . '*' . $voucher->igv . '*' . $voucher->serie;
                                    ?>
                                    <option value="<?php echo $dataVoucher ?>">
                                        <?php echo $voucher->name ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" id="idvoucher" name="idvoucher">
                            <input type="hidden" id="igv">
                        </div>
                        <div class="col-md-3">
                            <label for="">Serie:</label>
                            <input type="text" class="form-control" name="serie" id="serie" readonly>
                        </div>

                        <div class="col-md-3">
                            <label for="">Numero:</label>
                            <input type="text" class="form-control" id="num" name="num" readonly>
                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Cliente:</label>
                            <div class="input-group">
                                <input type="hidden" name="idclient" id="idclient">
                                <input type="text" class="form-control" disabled="disabled" id="client">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-3">
                            <label for="">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Producto:</label>
                            <input type="text" class="form-control" id="product">
                        </div>
                        <div class="col-md-2">
                            <label for="">&nbsp;</label>
                            <button id="btn-add" type="button" class="btn btn-success btn-flat btn-block">
                                <span class="fa fa-plus"></span>
                                Agregar
                            </button>
                        </div>
                    </div>

                    <table id="tbsales" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>

                                <th>Precio</th>
                                <th>Stock Max.</th>
                                <th>Cantidad</th>
                                <th>Importe</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="row form-group">

                        <div class="col-md-3">
                            <div class="input-group d-flex align-items-center">
                                <span class="input-group-addon">Subtotal:</span>
                                <input type="text" class="form-control" placeholder="Username" name="subtotal" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group d-flex align-items-center">
                                <span class="input-group-addon">IGV:</span>
                                <input type="text" class="form-control" placeholder="Username" name="igv" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group d-flex align-items-center">
                                <span class="input-group-addon">Descuento:</span>
                                <input type="text" class="form-control" placeholder="Username" name="discount" value="0.00" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group d-flex align-items-center">
                                <span class="input-group-addon">Total:</span>
                                <input type="text" class="form-control" placeholder="Username" name="total" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header mr-auto">
                <h4 class="modal-title">Lista de Clientes</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>N. documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><?php echo $client->id ?></td>
                                <td><?php echo $client->name ?></td>
                                <td><?php echo $client->num_document ?></td>
                                <?php $dataclient = $client->id . '*' . $client->name . '*' . $client->type_client_id . '*' . $client->type_document_id . '*' . $client->phone . '*' . $client->address ?>
                                <td>
                                    <button class="btn btn-success btn-check" value="<?php echo $dataclient ?>">
                                        <span class="fa fa-check"></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>N. documento</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->