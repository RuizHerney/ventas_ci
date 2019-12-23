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
                    <?php echo $this->session->flashdata('error'); ?>
                </p>
            </div>
        <?php endif ?>
        
        <form action="<?php echo base_url(); ?>matenimiento/cliente/update/<?php echo $client->id?>" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $client->name ?>">
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $client->last_name ?>">
            </div>

            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $client->phone ?>">
            </div>

            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $client->address ?>">
            </div>

            <div class="form-group">
                <label for="ruc">Ruc</label>
                <input type="text" class="form-control" name="ruc" id="ruc" value="<?php echo $client->ruc ?>">
            </div>

            <div class="form-group">
                <label for="business">Empresa</label>
                <input type="text" class="form-control" name="business" id="business" value="<?php echo $client->business ?>">
            </div>

            <div class="form-group">
                <label for="">Estado</label>
                <select name="state_id" id="state" class="form-control">
                    <?php foreach ($states as $state) : ?>
                        <option <?php if ($state->id == $client->state_id) { echo 'selected'; }?> value="<?php echo $state->id ?>">
                            <?php echo $state->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn.flat">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>