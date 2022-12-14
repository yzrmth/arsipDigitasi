<?= $this->extend('_layouts/script') ?>
<?= $this->extend('_layouts/indexLayouts') ?>

<?= $this->section('content-header') ?>
<!-- Content Header (Page header) -->
<h1 class="m-0 text-dark">Rekapitulasi Peta</h1>
<?= $this->endSection() ?>
<!-- /.content-header -->

<?= $this->section('main-content') ?>
<!-- Main content -->
<div class="card">
    <div class="card-header">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Tambah
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Peta/add') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="proyek" class="form-label">Proyek</label>
                                <input type="text" class="form-control" id="proyek" name="proyek">
                            </div>
                            <div class="mb-3">
                                <label for="Nomor_Peta" class="form-label">Nomor</label>
                                <input class="form-control" id="Nomor_Peta" name="nomor_peta"></input>
                            </div>
                            <div class="mb-3">
                                <label for="Tahun" class="form-label">Tahun</label>
                                <input class="form-control" id="Tahun" name="tahun"></input>
                            </div>
                            <div class="mb-3">
                                <label for="Kecamatan" class="form-label">Kecamatan</label>
                                <input class="form-control" id="Kecamatan" name="kecamatan"></input>
                            </div>
                            <div class="mb-3">
                                <label for="Desa" class="form-label">Desa</label>
                                <input class="form-control" id="Desa" name="desa"></input>
                            </div>
                            <div class="mb-3">
                                <label for="Kondisi_Fisik_Peta" class="form-label">Kondisi Fisik Peta</label>
                                <select class="form-control" aria-label="Default select example" name="kondisi_fisik">
                                    <option selected value="Baik"></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Tidak Ditemukan">Tidak Ditemukan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="filegambar" class="form-label">Pilih File Peta</label>
                                <input class="form-control" type="file" id="filegambar" name="file_foto">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
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
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($peta as $key => $value) : ?>
                    <tr role="button" data-href="<?= base_url('Peta/detil/' . $value->id_peta) ?>">
                        <td><?= $no ?></td>
                        <td><?= $value->nomor_peta ?></td>
                        <td><?= $value->proyek ?></td>
                        <td><?= $value->tahun ?></td>
                        <td><?= $value->kecamatan ?></td>
                        <td><?= $value->desa ?></td>
                        <td><?= $value->status ?></td>
                        <td></td>
                    </tr>
                <?php $no++;
                endforeach ?>
            </tbody>
        </table>
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