        			<!-- begin::Body -->
                    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
        
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Tambah Data Lensa
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" method="POST">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Nama Lensa:</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" id="nama" placeholder="Masukan Nama Lensa">
                            <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Merek:</label>
                        <div class="col-lg-6">
                            <input type="text" name="merek" value="<?= set_value('merek') ?>" class="form-control" id="merek" placeholder="Masukan Merek">
                            <?= form_error('merek', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Jenis Lensa:</label>
                        <div class="col-lg-6">
                            <input type="text" name="jenis" value="<?= set_value('jenis') ?>" class="form-control" id="jenis" placeholder="Masukan Jenis Lensa">
                            <?= form_error('jenis', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">URL:</label>
                        <div class="col-lg-6">
                            <input type="text" name="url" value="<?= set_value('url') ?>" class="form-control" id="url" placeholder="Masukan URL Produk">
                            <?= form_error('url', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Gambar:</label>
                        <div class="col-lg-6">
                            <input type="file" name="gambar" value="<?= set_value('gambar') ?>" class="form-control" id="gambar" placeholder="Masukan Gambar">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Deskripsi:</label>
                        <div class="col-lg-6">
                            <input type="text" name="deskripsi" value="<?= set_value('deskripsi') ?>" class="form-control" id="deskripsi" placeholder="Masukan Deskripsi Produk">
                            <?= form_error('deskripsi', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('Kamera') ?>" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <br>

            <!--end::Form-->
        </div>
    </div>

    <!--end::Portlet-->