				<!-- begin::Body -->

				<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

					<!-- begin:: Page -->
					<div class="m-grid m-grid--hor m-grid--root m-page">
						<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(<?= base_url('assets/') ?>app/media/img//bg/bg-1.jpg);">
							<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
								<div class="m-login__container">
									<div class="m-login__logo">
										<a href="#">
											<img src="<?= base_url('assets/') ?>demo/demo5/media/img/logo/camera.png">
										</a>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<div class="m-login__signin">
										<div class="m-login__head">
											<h3 class="m-login__title">Halaman Login</h3>
										</div>
										<form class="m-login__form m-form" method="POST" action="<?= base_url('auth'); ?>">
											<div class="form-group m-form__group">
												<input class="form-control m-input" type="text" placeholder="Email" id="email" name="email">
											</div>
											<div class="form-group m-form__group">
												<input class="form-control m-input m-login__form-input--last" type="password" id="password" placeholder="Password" name="password">
											</div>
											<div class="row m-login__form-sub">
												<div class="col m--align-left m-login__form-left">
													<label class="m-checkbox  m-checkbox--light">
														<input type="checkbox" name="remember"> Remember me
														<span></span>
													</label>
												</div>
												<div class="col m--align-right m-login__form-right">
													<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
												</div>
											</div>
											<div class="m-login__form-action">
												<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">Sign In</button>
											</div>
										</form>
									</div>
									<div class="m-login__signup">
										<div class="m-login__head">
											<h3 class="m-login__title">Daftar Akun</h3>
											<div class="m-login__desc">Harap Masukan Data-data Anda</div>
										</div>
										<form class="m-login__form m-form" method="POST" action="<?= base_url('auth/registrasi'); ?>">
											<div class="form-group m-form__group">
												<input class="form-control m-input" value="<?= set_value('nama'); ?>" type="text" placeholder="Nama Lengkap" name="nama" id="nama">
												<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group m-form__group">
												<input class="form-control m-input" value="<?= set_value('email'); ?>" type="text" placeholder="Email" name="email" id="email">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group m-form__group">
												<input class="form-control m-input" value="<?= set_value('password'); ?>" type="password" placeholder="Password" name="password" id="password">
												<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group m-form__group">
												<input class="form-control m-input m-login__form-input--last" value="<?= set_value('password1'); ?>" type="password" placeholder="Confirm Password" name="password1">
												<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="m-login__form-action">
												<button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign Up</button>&nbsp;&nbsp;
												<button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
											</div>
										</form>
									</div>
									<div class="m-login__forget-password">
										<div class="m-login__head">
											<h3 class="m-login__title">Forgotten Password ?</h3>
											<div class="m-login__desc">Enter your email to reset your password:</div>
										</div>
										<form class="m-login__form m-form" action="">
											<div class="form-group m-form__group">
												<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
											</div>
											<div class="m-login__form-action">
												<button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
												<button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
											</div>
										</form>
									</div>
									<div class="m-login__account">
										<span class="m-login__account-msg">
											Don't have an account yet ?
										</span>&nbsp;&nbsp;
										<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
									</div>
								</div>
							</div>
						</div>
					</div>