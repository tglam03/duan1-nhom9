<style>
	.nav-linkmenu:hover {
		text-decoration: underline !important;
		color: black !important;
	}
</style>
<header class="version_1">
	<div class="layer"></div><!-- Mobile menu overlay mask -->
	<div class="main_header">
		<div class="container">
			<div class="row small-gutters">
				<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
					<div id="logo">
						<a href="index.html"><img src="<?= BASE_URL; ?>assets/client/img/logo.svg" alt="" width="100" height="35"></a>
					</div>
				</div>
				<nav class="col-xl-6 col-lg-7">
					<a class="open_close" href="javascript:void(0);">
						<div class="hamburger hamburger--spin">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
					<!-- Menu -->
					<div class="main-menu">
						<div id="header_menu">
							<a href="index.html"><img src="<?= BASE_URL; ?>assets/client/img/logo_black.svg" alt="" width="100" height="35"></a>
							<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
						</div>
						<ul>
							<li>
								<a href="<?= BASE_URL; ?>">Trang chủ</a>
							</li>

							<li>
								<a href="<?= BASE_URL; ?>?act=products">Sản phẩm</a>
							</li>
							<li><a href="<?= BASE_URL; ?>?act=about">Giới thiệu</a></li>
							<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
								<li><a href="<?= BASE_URL; ?>?act=singout&dangnhap">Đăng nhập</a></li>
							<?php } else { ?>
								<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
									<li><a href="<?= BASE_URL; ?>?act=account">Tạo tài khoản</a></li>
								<?php } else { ?>
									<li class="nav-item">
										<a class="nav-linkmenu" href="<?= BASE_URL; ?>?act=singout&dangxuat">Đăng xuất</a>
									</li>
								<?php } ?>
							<?php } ?>
							<li><a href="<?= BASE_URL; ?>?act=help">Trợ giúp</a></li>
						</ul>
					</div>
					<!--/main-menu -->
				</nav>
				<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
					<a class="phone_top" href="#"><strong><span>Cần trợ giúp?</span>+84 423-23-221</strong></a>
				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
	<!-- /main_header -->

	<div class="main_nav inner">
		<div class="container">
			<div class="row small-gutters">
				<div class="col-xl-3 col-lg-3 col-md-3">
					<nav class="categories">
						<ul class="clearfix">
							<li><span>
									<a href="#">
										<span class="hamburger hamburger--spin">
											<span class="hamburger-box">
												<span class="hamburger-inner"></span>
											</span>
										</span>
										Danh mục
									</a>
								</span>
								<div id="menu">
									<ul>
										<li>
											<a href="<?= BASE_URL ?>">Trang chủ</a>
										</li>

										<li>
											<a href="<?= BASE_URL; ?>?act=products">Sản phẩm</a>
										</li>
										<li><a href="<?= BASE_URL; ?>?act=about">Giới thiệu</a></li>
										<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
											<li><a href="<?= BASE_URL; ?>?act=singout&dangnhap">Đăng nhập</a></li>
										<?php } else { ?>
											<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
												<li><a href="<?= BASE_URL; ?>?act=account">Tạo tài khoản</a></li>
											<?php } else { ?>
												<li>
													<a href="<?= BASE_URL; ?>?act=singout&dangxuat">Đăng xuất</a>
												</li>
											<?php } ?>
										<?php } ?>
										<li><a href="<?= BASE_URL; ?>?act=help">Trợ giúp</a></li>
									</ul>
								</div>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
					<div class="custom-search-input">
						<form method="post" action="<?=BASE_URL.'?act=products'?>" >
							<input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm" value="<?= (isset($_POST['kyw']) && $_POST['kyw'] != "") ? $_POST['kyw'] : ''; ?>">
							<button type="submit" name="kywsb"><i class="header-icon_search_custom"></i></button>
						</form>
					</div>
				</div>
				<!-- end tìm kiếm -->

				<div class="col-xl-3 col-lg-2 col-md-3">
					<ul class="top_tools">
						<li>
							<div class="dropdown dropdown-cart">
								<a href="<?= BASE_URL . '?act=cart-list' ?>" class="cart_bt"><strong><?= (isset($_SESSION['cart']) && $_SESSION['cart'] != "") ? sizeof($_SESSION['cart']) : 0; ?></strong></a>
								<div class="dropdown-menu">
									<?php

									if (!empty($_SESSION['cart'])) :

										foreach ($_SESSION['cart'] as $key => $values) : ?>
											<ul>
												<li>

													<a href="<?= BASE_URL . '?act=product-detail&id=' . $values['id']  ?>">
														<figure><img src="<?= BASE_URL . explode(',', $values['hinh'])[0]
																			?>" alt="" width="50" height="50" class="lazy"></figure>

														<strong><span><?= $values['ten_hh'] ?>

															</span><?= number_format($values['giam_gia'] ?: $values['don_gia']) ?></strong>
													</a>


												</li>
											</ul>

									<?php endforeach;
									endif;
									?>
									<div class="total_drop">
										<div class="clearfix"><strong>Tổng</strong><span><?= caculator_total_oder() ?></span></div>
										<a href="<?= BASE_URL . '?act=cart-list' ?>" class="btn_1 outline">Giỏ hàng</a><a href="<?= BASE_URL . '?act=oder-checkout' ?>" class="btn_1">Thanh toán</a>
									</div>
								</div>
							</div>



							<!-- /dropdown-cart-->
						</li>
						<li>
							<a href="#0" class="wishlist"><span>Yêu thích</span></a>
						</li>
						<li>
							<div class="dropdown dropdown-access">
								<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
									<a href="<?= BASE_URL; ?>?act=account" class="access_link"><span>Tài khoản</span></a>
								<?php } else { ?>
									<a class="access_link"><span>Tài khoản</span></a>
								<?php } ?>
								<div class="dropdown-menu">
									<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
										<a class="btn_1" href="<?= BASE_URL; ?>?act=singout&dangnhap">Đăng nhập</a>
									<?php } else { ?>
										<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
											<a href="<?= BASE_URL; ?>?act=account" class="btn_1">Đăng nhập hoặc đăng ký</a>
										<?php } else { ?>
											<p class="btn_1 w-100">Xin chào: <?= $_SESSION['user']['user'] ?></p>
										<?php } ?>
									<?php } ?>
									<ul>
										<li>
											<a href="<?= BASE_URL; ?>?act=cart-list"><i class="ti-package"></i>Giỏ hàng của tôi</a>
										</li>
										<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
										<?php } else { ?>
											<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
												<li>
													<a href="<?= BASE_URL; ?>?act=orderhistory"><i class="ti-anchor"></i>Lịch sử mua hàng</a>
												</li>
												<li>
													<a href="<?= BASE_URL; ?>?act=account-deiltail"><i class="ti-user"></i>Thông tin tài khoản</a>
												</li>
											<?php } ?>
										<?php } ?>
										<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
										<?php } else { ?>
											<?php if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1) { ?>
												<li>
													<a href="<?= BASE_URL_ADMIN ?>"><i class=" ti-desktop"></i>Đăng nhập vào trang quản trị</a>
												</li>
											<?php } ?>
										<?php } ?>
										<li>
											<a href="<?= BASE_URL; ?>?act=help"><i class="ti-help-alt"></i>Trợ giúp và câu hỏi thường gặp</a>
										</li>
										<?php if (isset($_SESSION['thoat']) && $_SESSION['thoat'] == 1) { ?>
										<?php } else { ?>
											<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
												<li class="d-flex">
													<a class="btn_1 w-100" href="<?= BASE_URL; ?>?act=singout&dangxuat"><i class="ti-close"></i>Đăng xuất</a>
													<?php if (isset($_SESSION['saveuser']) && !empty($_SESSION['saveuser'])) { ?>
														<a class="w-100" href="<?= BASE_URL; ?>?act=singout&thoat"><i class="ti-close"></i>Thoát</a>
													<?php } ?>
												</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!-- /dropdown-access-->
						</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /search_mobile -->
	</div>
	<!-- /main_nav -->
</header>