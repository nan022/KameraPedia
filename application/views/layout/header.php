<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>Kamera Pedia</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Page Vendors Styles -->
	<link href="<?= base_url('assets/') ?>vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url('assets/') ?>vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->

	<!--begin::Base Styles -->
	<link href="<?= base_url('assets/') ?>vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url('assets/') ?>vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?= base_url('assets/') ?>demo/demo5/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url('assets/') ?>demo/demo5/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>demo/demo5/media/img/logo/photo.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- begin::Header -->
		<header id="m_header" class="m-grid__item		m-header " m-minimize="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-header__top">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-stack m-stack--ver m-stack--desktop">

						<!-- begin::Brand -->
						<div class="m-stack__item m-brand">
							<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?= base_url('Admin') ?>" class="m-brand__logo-wrapper">
										<img alt="" src="<?= base_url('assets/') ?>demo/demo5/media/img/logo/camera1.png" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
										<a href="#" class="btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
											<span>Taste Good Feel Good</span>
										</a>
									</div>

									<!-- begin::Responsive Header Menu Toggler-->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<!-- end::Responsive Header Menu Toggler-->

									<!-- begin::Topbar Toggler-->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>

									<!--end::Topbar Toggler-->
								</div>
							</div>
						</div>

						<!-- end::Brand -->

						<!-- begin::Topbar -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?= base_url('assets/') ?>demo/demo5/media/img/logo/user.png" class="m--img-rounded m--marginless m--img-centered" alt="" />
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?= base_url('assets/') ?>app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="<?= base_url('assets/') ?>demo/demo5/media/img/logo/user.png" class="m--img-rounded m--marginless" alt="" />
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500"><?= $user['nama']; ?></span>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">My Profile</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">Activity</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">Messages</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="<?= base_url() ?>Auth/logout" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- end::Topbar -->
					</div>
				</div>
			</div>
			<div class="m-header__bottom">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-stack m-stack--ver m-stack--desktop">

						<!-- begin::Horizontal Menu -->
						<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<?php
							if ($user['role'] == 'Admin') { ?>
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
									<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
										<li class="m-menu__item" aria-haspopup="true">
											<a href="<?= base_url() ?>Admin" class="m-menu__link ">
												<span class="m-menu__link-text">Dashboard</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text">Data Table</span>
												<i class="m-menu__hor-arrow la la-angle-down"></i>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
												<span class="m-menu__arrow m-menu__arrow--adjust"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>Kamera" class="m-menu__link ">
															<i class="m-menu__link-icon flaticon-camera"></i>
															<span class="m-menu__link-title">
																<span class="m-menu__link-wrap">
																	<span class="m-menu__link-text">Data Kamera</span>
																</span>
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>Lensa" class="m-menu__link ">
															<i class="m-menu__link-icon flaticon-diagram"></i>
															<span class="m-menu__link-title">
																<span class="m-menu__link-wrap">
																	<span class="m-menu__link-text">Data Lensa</span>
																</span>
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="<?= base_url() ?>Aksesoris" class="m-menu__link ">
															<i class="m-menu__link-icon flaticon-suitcase"></i>
															<span class="m-menu__link-title">
																<span class="m-menu__link-wrap">
																	<span class="m-menu__link-text">Data Aksesoris</span>
																</span>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									<?php } else { ?>
										<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
											<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
												<li class="m-menu__item" aria-haspopup="true">
													<a href="<?= base_url() ?>Admin" class="m-menu__link ">
														<span class="m-menu__link-text">Dashboard</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
													<a href="javascript:;" class="m-menu__link m-menu__toggle">
														<span class="m-menu__item-here"></span>
														<span class="m-menu__link-text">Kamera Pedia</span>
														<i class="m-menu__hor-arrow la la-angle-down"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
														<span class="m-menu__arrow m-menu__arrow--adjust"></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item " aria-haspopup="true">
																<a href="<?= base_url() ?>Kamera/userView" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-camera"></i>
																	<span class="m-menu__link-title">
																		<span class="m-menu__link-wrap">
																			<span class="m-menu__link-text">Kamera</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-menu__item " aria-haspopup="true">
																<a href="<?= base_url() ?>Lensa/userView" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-diagram"></i>
																	<span class="m-menu__link-title">
																		<span class="m-menu__link-wrap">
																			<span class="m-menu__link-text">Lensa</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-menu__item " aria-haspopup="true">
																<a href="<?= base_url() ?>Aksesoris/userView" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-suitcase"></i>
																	<span class="m-menu__link-title">
																		<span class="m-menu__link-wrap">
																			<span class="m-menu__link-text">Aksesoris</span>
																		</span>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
											<?php } ?>
											<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel m-menu__item--more m-menu__item--icon-only" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
												<a href="javascript:;" class="m-menu__link m-menu__toggle">
													<span class="m-menu__item-here"></span>
													<i class="m-menu__link-icon flaticon-more-v3"></i>
													<span class="m-menu__link-text"></span>
												</a>
												<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--pull">
													<span class="m-menu__arrow m-menu__arrow--adjust"></span>
													<ul class="m-menu__subnav">
														<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
															<a href="inner.html" class="m-menu__link ">
																<i class="m-menu__link-icon flaticon-business"></i>
																<span class="m-menu__link-text">eCommerce</span>
															</a>
														</li>
														<li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
															<a href="crud/datatable_v1.html" class="m-menu__link m-menu__toggle">
																<i class="m-menu__link-icon flaticon-computer"></i>
																<span class="m-menu__link-text">Audience</span>
																<i class="m-menu__hor-arrow la la-angle-right"></i>
																<i class="m-menu__ver-arrow la la-angle-right"></i>
															</a>
															<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
																<span class="m-menu__arrow "></span>
																<ul class="m-menu__subnav">
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-users"></i>
																			<span class="m-menu__link-text">Active Users</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-interface-1"></i>
																			<span class="m-menu__link-text">User Explorer</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-lifebuoy"></i>
																			<span class="m-menu__link-text">Users Flows</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-graphic-1"></i>
																			<span class="m-menu__link-text">Market Segments</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-graphic"></i>
																			<span class="m-menu__link-text">User Reports</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
															<a href="inner.html" class="m-menu__link ">
																<i class="m-menu__link-icon flaticon-map"></i>
																<span class="m-menu__link-text">Marketing</span>
															</a>
														</li>
														<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
															<a href="inner.html" class="m-menu__link ">
																<i class="m-menu__link-icon flaticon-graphic-2"></i>
																<span class="m-menu__link-title">
																	<span class="m-menu__link-wrap">
																		<span class="m-menu__link-text">Campaigns</span>
																		<span class="m-menu__link-badge">
																			<span class="m-badge m-badge--success">3</span>
																		</span>
																	</span>
																</span>
															</a>
														</li>
														<li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
															<a href="javascript:;" class="m-menu__link m-menu__toggle">
																<i class="m-menu__link-icon flaticon-infinity"></i>
																<span class="m-menu__link-text">Cloud Manager</span>
																<i class="m-menu__hor-arrow la la-angle-right"></i>
																<i class="m-menu__ver-arrow la la-angle-right"></i>
															</a>
															<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
																<span class="m-menu__arrow "></span>
																<ul class="m-menu__subnav">
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-add"></i>
																			<span class="m-menu__link-title">
																				<span class="m-menu__link-wrap">
																					<span class="m-menu__link-text">File Upload</span>
																					<span class="m-menu__link-badge">
																						<span class="m-badge m-badge--danger">3</span>
																					</span>
																				</span>
																			</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-signs-1"></i>
																			<span class="m-menu__link-text">File Attributes</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-folder"></i>
																			<span class="m-menu__link-text">Folders</span>
																		</a>
																	</li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
																		<a href="inner.html" class="m-menu__link ">
																			<i class="m-menu__link-icon flaticon-cogwheel-2"></i>
																			<span class="m-menu__link-text">System Settings</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</li>
											</ul>
										</div>
								</div>

								<!-- end::Horizontal Menu -->

								<!--begin::Search-->
								<div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" m-quicksearch-mode="default">

									<!--begin::Search Form -->
									<form class="m-header-search__form">
										<div class="m-header-search__wrapper">
											<span class="m-header-search__icon-search" id="m_quicksearch_search">
												<i class="la la-search"></i>
											</span>
											<span class="m-header-search__input-wrapper">
												<input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
											</span>
											<span class="m-header-search__icon-close" id="m_quicksearch_close">
												<i class="la la-remove"></i>
											</span>
											<span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
												<i class="la la-remove"></i>
											</span>
										</div>
									</form>

									<!--end::Search Form -->

									<!--begin::Search Results -->
									<div class="m-dropdown__wrapper">
										<div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__body">
												<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
													<div class="m-dropdown__content m-list-search m-list-search--skin-light">
													</div>
												</div>
											</div>
										</div>
									</div>

									<!--end::Search Results -->
								</div>

								<!--end::Search-->
						</div>
					</div>
				</div>
		</header>

		<!-- end::Header -->