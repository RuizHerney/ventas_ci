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

        <form action="<?php echo base_url(); ?>matenimiento/cliente/update/<?php echo $client->id ?>" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control <?php echo !empty(form_error('name')) ? 'is-invalid' : ''; ?>" name="name" id="name" value="<?php echo $client->name ?>">
                <?php echo form_error(
                    'name',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" class="form-control <?php echo !empty(form_error('phone')) ? 'is-invalid' : ''; ?>" name="phone" id="phone" value="<?php echo $client->phone ?>">
                <?php echo form_error(
                    'phone',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" class="form-control <?php echo !empty(form_error('address')) ? 'is-invalid' : ''; ?>" name="address" id="address" value="<?php echo $client->address ?>">
                <?php echo form_error(
                    'address',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="type_client_id">Tipo de cliente</label>
                <select name="type_client_id" id="type_client_id" class="form-control <?php echo !empty(form_error('type_client_id')) ? 'is-invalid' : ''; ?>">
                    <?php foreach ($type_clients as $type_client) : ?>
                        <option <?php if ($type_client->id == $client->type_client_id) {
                                    echo 'selected';
                                } ?> value="<?php echo $type_client->id ?>">
                            <?php echo $type_client->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error(
                    'type_client_id',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="type_document_id">Tipo documento</label>
                <select name="type_document_id" id="type_document_id" class="form-control <?php echo !empty(form_error('type_document_id')) ? 'is-invalid' : ''; ?>">
                    <?php foreach ($type_documents as $type_document) : ?>
                        <option <?php if ($type_document->id == $client->type_document_id) {
                                    echo 'selected';
                                } ?> value="<?php echo $type_document->id ?>">
                            <?php echo $type_document->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <?php echo form_error(
                    'type_document_id',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="num_document">Documento</label>
                <input type="text" class="form-control <?php echo !empty(form_error('num_document')) ? 'is-invalid' : ''; ?>" name="num_document" id="num_document" value="<?php echo $client->num_document ?>">
                <?php echo form_error(
                    'num_document',
                    '<span class="help-block text-danger">',
                    '</span>'
                ) ?>
            </div>

            <div class="form-group">
                <label for="">Estado</label>
                <select name="state_id" id="state" class="form-control <?php echo !empty(form_error('state_id')) ? 'is-invalid' : ''; ?>">
                    <?php foreach ($states as $state) : ?>
                        <option <?php if ($state->id == $client->state_id) {
                                    echo 'selected';
                                } ?> value="<?php echo $state->id ?>">
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