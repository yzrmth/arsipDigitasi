<?= $this->extend('_layouts/indexLayouts') ?>

<?= $this->section('content-header') ?>
<!-- Content Header (Page header) -->
<h1 class="m-0 text-dark">Dashboard</h1>
<?= $this->endSection() ?>
<!-- /.content-header -->

<?= $this->section('main-content') ?>
<!-- Main content -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $j_data->getNumRows() ?></h3>

                <p>Scan Peta</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><sup style="font-size: 20px">%</sup></h3>

                <p>Digitasi</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $j_terpetakan->getNumRows() ?></h3>

                <p>Terpetakan</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $j_belum_terpetakan->getNumRows() ?></h3>

                <p>Belum Terpetakan</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


</div>
<!-- ./col -->
<!-- /.content -->
</div>
<?= $this->endSection() ?>