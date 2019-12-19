<!DOCTYPE html>
<html>

<head>
    <?php require APPPATH . 'views/inc/admin/head.php' ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>VENTAS</b>_CI</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>

                <form action="<?php echo base_url(); ?>/Home/login" method="POST">

                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Email" name="user_name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <span>
                                <?php echo $this->session->flashdata('error')?>
                            </span>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <?php require APPPATH . 'views/inc/admin/scripts.php' ?>
</body>

</html>