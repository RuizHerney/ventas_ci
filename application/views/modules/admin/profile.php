<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center"><?php echo $user->name . ' ' . $user->last_name; ?></h3>

                        <p class="text-muted text-center"><?php echo $user->role ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item text-center">
                                <b>Telefono</b>
                                <br>
                                <a class="">
                                    <?php echo $user->phone; ?>
                                </a>
                            </li>

                            <li class="list-group-item text-center">
                                <b>Correo</b>
                                <a class="">
                                    <?php echo $user->email; ?>
                                </a>
                            </li>

                            <li class="list-group-item text-center">
                                <b>N. Usuario</b>
                                <br>
                                <a class="">
                                    <?php echo $user->user_name ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Ventas</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->

                </div>
            </div>
        </div>
    </div>
</section>