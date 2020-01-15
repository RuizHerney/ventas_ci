<?php if ($permission->p_read == 1) : ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $clients ?></h3>

                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Clientes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $products ?></h3>

                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Productos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?php echo $users ?></h3>

                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Usuarios <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $sales ?></h3>

                    <p>Ventas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Ventas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <figure class="highcharts-figure">
        <div id="graph"></div>
        <p class="highcharts-description">
            A basic column chart compares rainfall values between four cities.
            Tokyo has the overall highest amount of rainfall, followed by New York.
            The chart is making use of the axis crosshair feature, to highlight
            months as they are hovered over.
        </p>
    </figure>
<?php endif ?>