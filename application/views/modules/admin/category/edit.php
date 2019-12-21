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
        
        <form action="<?php echo base_url(); ?>matenimiento/categoria/update/<?php echo $category->id?>" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $category->name ?>">
            </div>

            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php echo $category->description ?>">
            </div>

            <div class="form-group">
                <label for="">Estado</label>
                <select name="state_id" id="state" class="form-control">
                    <?php foreach ($states as $state) : ?>
                        <option <?php if ($state->id == $category->state_id) { echo 'selected'; }?> value="<?php echo $state->id ?>">
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