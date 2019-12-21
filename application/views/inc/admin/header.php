<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?php if (isset($title)) : ?>
                    <h1 class="m-0 text-dark"><?php echo $title ?></h1>
                <?php endif ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/admin">Home</a></li>
                    <?php if (isset($title)) : ?>
                        <li class="breadcrumb-item active"><?php echo $title ?></</li> <?php endif ?> <?php if (isset($subTitle)) : ?> <li class="breadcrumb-item active"><?php echo $subTitle ?></</li> <?php endif ?> </ol> </div> <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>