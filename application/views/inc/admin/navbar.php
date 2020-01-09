<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url(); ?>admin" class="nav-link">Inicio</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="user-panel">
                    <div class="image">
                        <img src="<?php echo base_url() ?>public/src/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Perfil
                                <span class="float-right text-sm text-primary"><i class="fas fa-user"></i></span>
                            </h3>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Papelera
                                <span class="float-right text-sm text-primary"><i class="fas fa-trash-alt"></i></span>
                            </h3>
                        </div>
                    </div>
                </a>

                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url(); ?>home/logout" class="dropdown-item dropdown-footer bg-danger">Cerrar Sesion</a>
            </div>
        </li>
    </ul>
</nav>