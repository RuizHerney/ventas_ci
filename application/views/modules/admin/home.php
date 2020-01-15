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
            </div>
        </div>
    </div>
    <figure class="highcharts-figure">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Grafico estadistico</h3>

            <div class="">
                <select name="year" id="year" class="form-control">
                    <?php foreach ($years as $year) : ?>
                        <option value="<?php echo $year->year ?>">
                            <?php echo $year->year ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div id="graph"></div>
    </figure>
<?php endif ?>