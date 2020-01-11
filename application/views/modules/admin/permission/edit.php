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
        <form action="<?php echo base_url(); ?>adminstrador/permisos/update/<?php echo $permission->id?>" method="POST">

            <div class="form-group">
                <label for="menu_id">Menu</label>
                <select name="menu_id" id="" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu->id;?>" <?php echo $permission->menu_id == $menu->id ? 'selected' : '';?>>
                            <?php echo $menu->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="role_id">Nombre</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?php echo $role->id ?>" <?php echo $permission->role_id == $role->id ? 'selected' : '';?>>
                            <?php echo $role->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-control my-2">
                <label for="p_read">Leer</label>
                <label class="radio-inline">
                    <input type="radio" name="p_read" value="1" <?php echo $permission->p_read == 1 ? 'checked' : '';?>>
                    Si
                </label>
                <label class="radio-inline">
                    <input type="radio" name="p_read" value="0" <?php echo $permission->p_read == 0 ? 'checked' : '';?>>
                    No
                </label>
            </div>

            <div class="form-control my-2">
                <label for="p_insert">Agregar</label>
                <label class="radio-inline">
                    <input type="radio" name="p_insert" value="1" <?php echo $permission->p_insert == 1 ? 'checked' : '';?>>
                    Si
                </label>
                <label class="radio-inline">
                    <input type="radio" name="p_insert" value="0" <?php echo $permission->p_insert == 0 ? 'checked' : '';?>>
                    No
                </label>
            </div>

            <div class="form-control my-2">
                <label for="p_update">Actualizar</label>
                <label class="radio-inline">
                    <input type="radio" name="p_update" value="1" <?php echo $permission->p_update == 1 ? 'checked' : '';?>>
                    Si
                </label>
                <label class="radio-inline">
                    <input type="radio" name="p_update" value="0" <?php echo $permission->p_update == 0 ? 'checked' : '';?>>
                    No
                </label>
            </div>

            <div class="form-control my-2">
                <label for="p_delete">Eliminar</label>
                <label class="radio-inline">
                    <input type="radio" name="p_delete" value="1" <?php echo $permission->p_delete == 1 ? 'checked' : '';?>>
                    Si
                </label>
                <label class="radio-inline">
                    <input type="radio" name="p_delete" value="0" <?php echo $permission->p_delete == 0 ? 'checked' : '';?>>
                    No
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn.flat">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>