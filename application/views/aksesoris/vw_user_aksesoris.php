			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
			    <div class="m-grid__item m-grid__item--fluid m-wrapper">
			        <div class="row">
			            <div class="col-xl-10">
			                <!--end:: Widgets/Announcements 1-->
			            </div>
			            <?php $i = 1; ?>
			            <?php foreach ($aksesoris as $aks) : ?>
			                <div class="col-xl-4">
			                    <!--begin:: Widgets/Blog-->
			                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
			                        <div class="m-portlet__head m-portlet__head--fit">
			                        </div>
			                        <div class="m-portlet__body">
			                            <div class="m-widget19">
			                                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
			                                    <img src="<?= base_url('assets/demo/demo5/img/aks/') . $aks['gambar']; ?>" alt="">
			                                </div>
			                                <div class="m-widget19__content">
			                                    <div class="m-widget19__body">
			                                        <?= $aks['deskripsi']; ?>
			                                        <a href="<?= $aks['url']; ?>" class="btn btn-warning" role="button">Buy</a>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <?php $i++; ?>
			            <?php endforeach; ?>
			        </div>
			    </div>
			</div>