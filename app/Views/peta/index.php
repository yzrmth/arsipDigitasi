<?= $this->extend('_layouts/script') ?>
<?= $this->extend('_layouts/indexLayouts') ?>

<?= $this->section('content-header') ?>
<!-- Content Header (Page header) -->
<h1 class="m-0 text-dark"><?= $title ?></h1>
<?= $this->endSection() ?>
<!-- /.content-header -->

<?= $this->section('main-content') ?>
<!-- Main content -->
<div class="card">
    <div class="card-header">
        <!-- Button trigger modal -->
        <div class="row">
            <div class="col">

                <a href="<?= base_url('Peta/formTambah') ?>" class="btn btn-primary" role="button" data-bs-toggle="button">Tambah</a>
            </div>

            <div class="col offset-md-4 d-grid gap-2 d-md-flex justify-content-md-end">

                <!-- SEARCH by file_foto -->
                <form class="form-inline ml-3" action="" method="POST">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" name="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <!-- /.card-header -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Sukses !</b>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Peta</th>
                        <th>Proyek</th>
                        <th>Tahun</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Nama File Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =  1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($peta as $key => $value) : ?>
                        <tr role="button" data-href="<?= base_url('Peta/' . $value->id_peta) ?>">
                            <td><?= $no ?></td>
                            <td><?= $value->nomor_peta ?></td>
                            <td><?= $value->proyek ?></td>
                            <td><?= $value->tahun ?></td>
                            <td><?= $value->kecamatan ?></td>
                            <td><?= $value->desa ?></td>
                            <td><?= $value->file_foto ?></td>
                            <td></td>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
            <?= $pager->links('PetaTable', 'simple_pagination') ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- ./col -->
    <!-- /.content -->
</div>
<?= $this->endSection() ?>

<?= $this->section('addScript') ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>
<?= $this->endSection() ?>