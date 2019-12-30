    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>public/src/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VENTAS_CI</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>public/src/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('last_name') ?>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Inicio</p>
              </a>
            </li>

            <li class="nav-item has-treeview">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                <p>
                  Matenimiento
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?php echo base_url();?>matenimiento/categoria" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categorias</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url();?>matenimiento/cliente" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                    
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url();?>matenimiento/producto" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Productos</p> 
                  </a>
                </li>

              </ul>

            </li>

            <li class="nav-item has-treeview">

              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
                <p>
                  Movimientos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?php echo base_url();?>movimientos/ventas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ventas</p>
                  </a>
                </li>

              </ul>

            </li>

            <li class="nav-item has-treeview">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Reportes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categorias</p>
                  </a>
                </li>

              </ul>

            </li>

            <li class="nav-item has-treeview">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Administrador
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categorias</p>
                  </a>
                </li>

              </ul>

            </li>


            <li class="nav-item">
              <a href="<?php echo base_url();?>home/logout" class="nav-link">
                <i class="far fa-power-off nav-icon"></i>
                <p>Cerrar Sesion</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>