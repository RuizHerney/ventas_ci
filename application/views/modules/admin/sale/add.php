<div class="box box-solid">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <form action="<?php echo base_url(); ?>movimientos/ventas/store" method="POST" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">Comprobante:</label>
                            <select name="comprobantes" id="comprobantes" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Boleta</option>
                                <option value="2">Factura</option>
                            </select>
                            <input type="hidden" id="idcomprobante" name="idcomprobante">
                            <input type="hidden" id="igv">
                        </div>
                        <div class="col-md-3">
                            <label for="">Serie:</label>
                            <input type="text" class="form-control" name="serie" readonly>
                        </div>

                        <div class="col-md-3">
                            <label for="">Numero:</label>
                            <input type="text" class="form-control" id="numero" name="numero" readonly>
                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Cliente:</label>
                            <div class="input-group">
                                <input type="hidden" name="idcliente" id="idcliente">
                                <input type="text" class="form-control" disabled="disabled" id="cliente">
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
                            <input type="text" class="form-control" id="producto">
                        </div>
                        <div class="col-md-2">
                            <label for="">&nbsp;</label>
                            <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                        </div>
                    </div>

                    <table id="tbventas" class="table table-bordered table-striped table-hover">
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
                                <input type="text" class="form-control" placeholder="Username" name="descuento" value="0.00" readonly="readonly">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lita de Clientes</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
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