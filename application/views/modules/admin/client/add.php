<div class="card">
    <div class="card-header">
        <div class="">
            <h3 class="card-title"><?php echo $subTitle . ' ' . $title ?></h3>
        </div>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    $times;
                </button>
                <p>
                    <i class="icon fa fa-ban"></i>
                    <?php echo $this->session->flashdata('error');?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?php echo base_url(); ?>matenimiento/cliente/create" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>

            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>

            <div class="form-group">
                <label for="ruc">Ruc</label>
                <input type="text" class="form-control" name="ruc" id="ruc">
            </div>
            
            <div class="form-group">
                <label for="business">Empresa</label>
                <input type="text" class="form-control" name="business" id="business">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn.flat">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>