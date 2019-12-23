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
                <input type="text" class="form-control" name="code" id="code">
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" class="form-control" name="stock" id="stock">
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
            </div>

            <div class="form-group">
                <label for="state_id">Categoria</label>
                <select name="state_id" class="form-control" id="state_id">
                    <option value="">Seleccione...</option>
                    <?php foreach ($states as $state) : ?>
                        <option value="<?php echo $state->id ?>">
                            <?php echo $state->name; ?>
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