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
        <form action="<?php echo base_url(); ?>adminstrador/usuarios/create" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control <?php echo !empty(form_error('name'))? 'is-invalid' : ''; ?>" name="name" id="name" value="<?php echo set_value('name'); ?>">
                <?php echo form_error(
                    'name',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control <?php echo !empty(form_error('last_name'))? 'is-invalid' : ''; ?>" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>">
                <?php echo form_error(
                    'last_name',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control <?php echo !empty(form_error('phone'))? 'is-invalid' : ''; ?>" name="phone" id="phone" value="<?php echo set_value('phone'); ?>">
                <?php echo form_error(
                    'phone',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" class="form-control <?php echo !empty(form_error('email'))? 'is-invalid' : ''; ?>" name="email" id="email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error(
                    'email',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="user_name">Nombre de Usuario</label>
                <input type="text" class="form-control <?php echo !empty(form_error('user_name'))? 'is-invalid' : ''; ?>" name="user_name" id="user_name" value="<?php echo set_value('user_name'); ?>">
                <?php echo form_error(
                    'user_name',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control <?php echo !empty(form_error('password'))? 'is-invalid' : ''; ?>" name="password" id="password" value="<?php echo set_value('password'); ?>">
                <?php echo form_error(
                    'password',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="role_id">Rol</label>
                <select name="role_id" class="form-control" id="role_id">
                    <option value="">Seleccione...</option>
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?php echo $role->id ?>">
                            <?php echo $role->name; ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error(
                    'role_id',
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