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
        <form action="<?php echo base_url(); ?>matenimiento/producto/create" method="POST">

            <div class="form-group">
                <label for="code">Codigo</label>
                <input type="text" class="form-control <?php echo !empty(form_error('code')) ? 'is-invalid' : ''; ?>" name="code" id="code" value="<?php echo set_value('code') ?>">
                <?php echo form_error(
                    'code',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control <?php echo !empty(form_error('name')) ? 'is-invalid' : ''; ?>" name="name" id="name" value="<?php echo set_value('name') ?>">
                <?php echo form_error(
                    'name',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control <?php echo !empty(form_error('description')) ? 'is-invalid' : ''; ?>" name="description" id="description" value="<?php echo set_value('description') ?>">
                <?php echo form_error(
                    'description',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control <?php echo !empty(form_error('price')) ? 'is-invalid' : ''; ?>" name="price" id="price" value="<?php echo set_value('price') ?>">
                <?php echo form_error(
                    'price',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" class="form-control <?php echo !empty(form_error('stock')) ? 'is-invalid' : ''; ?>" name="stock" id="stock" value="<?php echo set_value('stock') ?>">
                <?php echo form_error(
                    'stock',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="">Seleccione...</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->id ?>">
                            <?php echo $category->name; ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error(
                    'category_id',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="state_id">Estado</label>
                <select name="state_id" class="form-control" id="state_id">
                    <option value="">Seleccione...</option>
                    <?php foreach ($states as $state) : ?>
                        <option value="<?php echo $state->id ?>">
                            <?php echo $state->name; ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error(
                    'state_id',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn.flat">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>