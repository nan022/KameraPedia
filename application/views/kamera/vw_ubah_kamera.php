			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
			    <div class="m-grid__item m-grid__item--fluid m-wrapper">
			        <!-- begin:: Page -->
			        <div class="m-grid m-grid--hor m-grid--root m-page">
			            <!--begin::Portlet-->
			            <div class="m-portlet">
			                <div class="m-portlet__head">
			                    <div class="m-portlet__head-caption">
			                        <div class="m-portlet__head-title">
			                            <span class="m-portlet__head-icon m--hide">
			                                <i class="la la-gear"></i>
			                            </span>
			                            <h3 class="m-portlet__head-text">
			                                Edit Kamera
			                            </h3>
			                        </div>
			                    </div>
			                </div>

			                <!--begin::Form-->
			                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" method="POST">
			                    <input type="hidden" name="id_kamera" value="<?= $kamera['id_kamera']; ?>">
			                    <div class="m-portlet__body">
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Nama Kamera:</label>
			                            <div class="col-lg-6">
			                                <input type="text" name="nama" value="<?= $kamera['nama']; ?>" class="form-control" id="nama">
			                                <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Merek Kamera:</label>
			                            <div class="col-lg-4">
			                                <input type="text" name="merek" value="<?= $kamera['merek']; ?>" class="form-control" id="merek">
			                                <?= form_error('merek', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Jenis Kamera:</label>
			                            <div class="col-lg-6">
			                                <input type="text" name="jenis" value="<?= $kamera['jenis']; ?>" class="form-control" id="jenis">
			                                <?= form_error('jenis', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Sensor:</label>
			                            <div class="col-lg-5">
			                                <input type="text" name="sensor" value="<?= $kamera['sensor']; ?>" class="form-control" id="sensor" placeholder="Masukan Tahun Akademik">
			                                <?= form_error('sensor', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">URL:</label>
			                            <div class="col-lg-3">
			                                <input type="text" name="url" value="<?= $kamera['url']; ?>" class="form-control" id="url">
			                                <?= form_error('url', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Gambar:</label>
			                            <div class="col-lg-4">
			                                <input type="file" name="gambar" value="<?= $kamera['gambar']; ?>" class="form-control" id="gambar">
			                                <?= form_error('gambar', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
                                    <div class="form-group m-form__group row">
			                            <label class="col-lg-2 col-form-label">Deskripsi:</label>
			                            <div class="col-lg-6">
			                                <input type="text" name="deskripsi" value="<?= $kamera['deskripsi']; ?>" class="form-control" id="deskripsi">
			                                <?= form_error('deskripsi', '<small class="text-danger p1-3">', '</small>'); ?>
			                            </div>
			                        </div>
			                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			                            <div class="m-form__actions m-form__actions--solid">
			                                <div class="row">
			                                    <div class="col-lg-2"></div>
			                                    <div class="col-lg-6">
			                                        <button type="submit" class="btn btn-success">Ubah Data</button>
			                                        <button href="<?= base_url('Kamera') ?>" class="btn btn-secondary">Batal</button>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                </form>

			                <!--end::Form-->
			            </div>

			            <!--end::Portlet-->
			        </div>
			        <br>