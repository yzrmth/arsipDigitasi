<?= $this->extend('_layouts/head') ?>
<?= $this->extend('_layouts/script') ?>
<?= $this->extend('_layouts/indexLayouts') ?>


<!-- addHead -->
<?= $this->section('addHead') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/plugins/ekko-lightbox/ekko-lightbox.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
<title><?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->section('content-header') ?>
<!-- Content Header (Page header) -->
<h1 class="m-0 text-dark"><?= $content_header ?></h1>
<?= $this->endSection() ?>


<?= $this->section('main-content') ?>
<form action="<?= base_url('Peta/add') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="proyek" class="form-label">Proyek</label>
        <input type="text" class="form-control" id="proyek" name="proyek" autofocus value="<?= old('proyek') ?>">
    </div>
    <div class="mb-3">
        <label for="nomor_peta" class="form-label">Nomor</label>
        <input class="form-control" id="nomor_peta" name="nomor_peta" value="<?= old('nomot_peta') ?>"></input>
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input class="form-control" id="tahun" name="tahun" value="<?= old('tahun') ?>"></input>
    </div>
    <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input class="form-control" id="kecamatan" name="kecamatan" value="<?= old('kecamatan') ?>"></input>
    </div>
    <div class="mb-3">
        <label for="desa" class="form-label">Desa</label>
        <input class="form-control" id="desa" name="desa" value="<?= old('desa') ?>"></input>
    </div>
    <div class="mb-3">
        <label for="kondisi_fisik_peta" class="form-label">Kondisi Fisik Peta</label>
        <select class="form-control <?= $validation->hasError('kondisi_fisik') ? 'is-invalid' : '' ?>" aria-label="Default select example" id="kondisi_fisik_peta" name="kondisi_fisik">
            <option selected value="<?= old('proyek') ?>"></option>
            <option value="Baik">Baik</option>
            <option value="Rusak">Rusak</option>
            <option value="Tidak Ditemukan">Tidak Ditemukan</option>
        </select>
        <div class="invalid-feedback">
            Kondisi fisik peta tidak boleh kosong.
        </div>
    </div>
    <div class="mb-3">
        <label for="file_foto" class="form-label">Pilih File Peta</label>
        <input class="form-control <?= $validation->hasError('file_foto') ? 'is-invalid' : '' ?>" type="file" id="file_foto" name="file_foto" value="<?= (old('file_foto')) ? old('file_foto') : '' ?> ">
        <div class="invalid-feedback">
            <?= $validation->getError('file_foto'); ?>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-success" id="tombolSimpan">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>