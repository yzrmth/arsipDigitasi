<?= $this->extend('_layouts/head') ?>
<?= $this->extend('_layouts/script') ?>
<?= $this->extend('_layouts/indexLayouts') ?>


<!-- addHead -->
<?= $this->section('addHead') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/plugins/ekko-lightbox/ekko-lightbox.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
<title>AdminLTE 3 | Detil</title>
<?= $this->endSection() ?>

<?= $this->section('content-header') ?>
<!-- Content Header (Page header) -->
<h1 class="m-0 text-dark">Detil Peta</h1>
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Sukses !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Deskripsi Peta
                        </h3>
                    </div>
                    <div class="col-md-4 offset-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="<?= base_url('Peta/edit/' . $peta->id_peta) ?>" method="post" class="mr-1">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-trash"></i>
                                Edit
                            </button>
                        </form>
                        <form action="<?= base_url('/Peta/' . $peta->id_peta) ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class=" card-body">
                <dl class="row">
                    <dt class="col-sm-4">Proyek</dt>
                    <dd class="col-sm-8"><?= $peta->proyek ?></dd>
                    <dt class="col-sm-4">Nomor Peta</dt>
                    <dd class="col-sm-8"><?= $peta->nomor_peta ?></dd>
                    <dt class="col-sm-4">Tahun</dt>
                    <dd class="col-sm-8"><?= $peta->tahun ?></dd>
                    <dt class="col-sm-4">Kecamatan</dt>
                    <dd class="col-sm-8"><?= $peta->kecamatan ?></dd>
                    <dt class="col-sm-4">Desa</dt>
                    <dd class="col-sm-8"><?= $peta->desa ?></dd>
                    <dt class="col-sm-4">Kondisi Fisik Peta</dt>
                    <dd class="col-sm-8"><?= $peta->kondisi_fisik ?></dd>
                </dl>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!--  -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    File Tersedia
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">File scan</dt>

                    <dd class="col-sm-8"><?php
                                            if ($peta->file_foto != null) {
                                                $href = base_url('Peta/do_download/' . $peta->id_peta);
                                                echo  '<a class="btn btn-primary btn-sm link-light float-right" href="' . $href . '">
                                                <i class="fas fa-download"></i></a>' . $peta->file_foto;
                                            } else {
                                                echo '<a class="btn btn-success btn-sm link-light" href="#" data-toggle="modal" data-target="#formEdit">
                                                <i class="fas fa-plus"></i> 
                                                add gambar
                                            </a>';
                                            }
                                            ?></dd>
                    <dt class="col-sm-4">File dwg</dt>
                    <dd class="col-sm-8"><?php
                                            $href = base_url('Peta/do_download/' . $peta->id_peta);
                                            if ($peta->file_dwg != null) {
                                                echo '<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                                <i class="fas fa-download"></i> Download</button>' . $peta->file_dwg;
                                            } else {
                                                echo '<a class="btn btn-success btn-sm link-light " href="#" data-toggle="modal" data-target="#addDWG">
                                                <i class="fas fa-plus"></i> 
                                                add file dwg
                                            </a>';
                                            }
                                            ?></dd>
                    <dt class="col-sm-4">File shp</dt>
                    <dd class="col-sm-8"><?php
                                            $href = base_url('Peta/download_foto/' . $peta->id_peta);
                                            if ($peta->file_shp != null) {
                                                echo $peta->file_shp;
                                            } else {
                                                echo '<a class="btn btn-success btn-sm link-light " href="' . $href . '">
                                                <i class="fas fa-plus"></i> 
                                                add file shp
                                            </a>';
                                            }
                                            ?></dd>
                </dl>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-6">
        <a href="<?= base_url('uploads/FOTO/' . $peta->file_foto) ?>" data-toggle="lightbox" data-title="sample 12 - black">
            <img src="<?= base_url('uploads/FOTO/' . $peta->file_foto) ?>" class="img-fluid mb-12" alt="No Image">
        </a>
    </div>


</div>
<!-- MOdal Edit -->
<div class="modal fade" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Peta/edit/' . $peta->id_peta) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $peta->id_peta ?>">
                    <div class="mb-3">
                        <label for="proyek" class="form-label">Proyek</label>
                        <input type="text" class="form-control" id="proyek" name="proyek" value="<?= $peta->proyek ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Nomor_Peta" class="form-label">Nomor</label>
                        <input class="form-control" id="Nomor_Peta" name="nomor_peta" value="<?= $peta->nomor_peta ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Tahun" class="form-label">Tahun</label>
                        <input class="form-control" id="Tahun" name="tahun" value="<?= $peta->tahun ?>"></input>
                    </div>
                    <div class=" mb-3">
                        <label for="Kecamatan" class="form-label">Kecamatan</label>
                        <input class="form-control" id="Kecamatan" name="kecamatan" value="<?= $peta->kecamatan ?>"></input>
                    </div>
                    <div class=" mb-3">
                        <label for="Desa" class="form-label">Desa</label>
                        <input class="form-control" id="Desa" name="desa" value="<?= $peta->desa ?>"></input>
                    </div>
                    <div class=" mb-3">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="status1" name="status" value="Terpetakan">
                            <label for="status1" class="custom-control-label">Terpetakan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="status2" name="status" value="Belum Terpetakan">
                            <label for="status2" class="custom-control-label">Belum Terpetakan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Kondisi_Fisik_Peta" class="form-label">Kondisi Fisik Peta</label>
                        <select class="form-control" aria-label="Default select example" name="kondisi_fisik">
                            <option selected value=" <?= $peta->kondisi_fisik ?>"></option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Ditemukan">Tidak Ditemukan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="filegambar" class="form-label">Pilih File Peta</label>
                        <label for="filegambar" class="form-label"><?= $peta->file_foto ?></label>
                        <input class="form-control" type="file" id="filegambar" name="file_foto" value="<?= $peta->file_foto ?>">
                    </div>

                    <div class=" modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal add dwg -->
<div class="modal fade" id="addDWG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add DWG File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Peta/add_dwg/' . $peta->id_peta) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="put">
                    <div class="mb-3">
                        <label for="Kondisi_Fisik_Peta" class="form-label">Status FIle Digitasi</label>
                        <select class="form-control" aria-label="Default select example" name="status">
                            <option value="Sudah Dipetakan">Sudah Dipetakan</option>
                            <option value="Belum Terpetakan">Belum Terpetakan</option>
                            <option value="Sudah Peningkatan Kualitas (KKP)">Sudah Peningkatan Kualitas (KKP)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="filegambar" class="form-label">Pilih File DWG</label>
                        <label for="filegambar" class="form-label"><?= $peta->file_dwg ?></label>
                        <input class="form-control" type="file" id="filegambar" name="file_dwg">
                    </div>

                    <div class=" modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- <?= $this->section('addScript') ?>
<script src="<?= base_url('public/assets/plugins/ekko-lightbox/ekko-lightbox.min.js') ?>"></script>
<script src="<?= base_url('public/assets/dist/js/demo.js') ?>"></script>
<script src="<?= base_url('public/assets/plugins/filterizr/jquery.filterizr.min.js') ?>"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
<?= $this->endSection() ?> -->