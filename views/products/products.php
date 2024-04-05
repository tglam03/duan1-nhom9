<main>
	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?= BASE_URL; ?>">Trang chủ</a></li>
						<li><a href="#">Danh mục</a></li>
						<li>Trang hoạt động</li>
					</ul>
				</div>
				<h1>Shoes - Grid listing</h1>
			</div>
		</div>
		<img src="<?= BASE_URL ?>assets/client/img/banner1.jpg" class="img-fluid" alt="">
	</div>
	<!-- /end banner trên -->
	<!-- sắp xếp -->
	<div id="stick_here"></div>
	<div class="toolbox elemento_stick">
		<div class="container">
			<ul class="clearfix">
				<li>
					<div class="sort_select">
						<select name="sort" id="sort" onchange="sendSelectedValue()">
							<option value="popularity" <?= ($selectedValue == 'popularity') ? 'selected' : ''; ?>>Phổ biến nhất</option>
							<option value="new" <?= ($selectedValue == 'new') ? 'selected' : ''; ?>>Mới nhất</option>
							<option value="price" <?= ($selectedValue == 'price') ? 'selected' : ''; ?>>Giá thấp đến cao</option>
							<option value="price-desc" <?= ($selectedValue == 'price-desc') ? 'selected' : ''; ?>>Giá cao đến thấp
						</select>
					</div>
				</li>
				<li>
					<a href="#"><i class="ti-view-grid"></i></a>
					<a href="#"><i class="ti-view-list"></i></a>
				</li>
				<li>
					<a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
						<i class="ti-filter"></i><span>Bộ lọc</span>
					</a>
				</li>
			</ul>
			<form method="post" action="<?= BASE_URL ?>?act=products">
				<div class="collapse" id="filters">
					<div class="row small-gutters filters_listing_1">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="dropdown">
								<a href="#" data-bs-toggle="dropdown" class="drop">Loại sản phẩm</a>
								<div class="dropdown-menu">
									<div class="filter_type">
										<ul>
											<li>
												<?php foreach ($cartory as $key => $cartory) { ; ?>
													<label class="container_check"><?=$cartory['ten_loai']?> <small>12</small>
														<input type="radio" name="loaisp" value="=<?=$cartory['id']?>">
														<span class="checkmark"></span>
													</label>
												<?php } ?>
											</li>
										</ul>
										<input type="submit" class="w-100 form-control bg-primary text-white" name="submit">
									</div>
								</div>
							</div>
							<!-- /dropdown -->
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="dropdown">
								<a href="#" data-bs-toggle="dropdown" class="drop">Số lượt xem</a>
								<div class="dropdown-menu">
									<div class="filter_type">
										<ul>
											<li>
											<label class="container_check">0 — 10<small>11</small>
													<input type="radio" name="soluotxem" value="0-10">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">10 — 20<small>11</small>
													<input type="radio" name="soluotxem" value="10-20">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">20 — 30<small>11</small>
													<input type="radio" name="soluotxem" value="20-30">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">>30<small>11</small>
													<input type="radio" name="soluotxem" value=">30">
													<span class="checkmark"></span>
												</label>
											</li>
										</ul>
										<input type="submit" class="w-100 form-control bg-primary text-white" name="submit">
									</div>
								</div>
							</div>

							<!-- /dropdown -->
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="dropdown">
								<a href="#" data-bs-toggle="dropdown" class="drop">Giá</a>
								<div class="dropdown-menu">
									<div class="filter_type">
										<ul>
											<li>
												<label class="container_check">$0 — $50<small>11</small>
													<input type="radio" name="dongia" value="0-50">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">$50 — $100<small>11</small>
													<input type="radio" name="dongia" value="50-100">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">$100 — $150<small>11</small>
													<input type="radio" name="dongia" value="100-150">
													<span class="checkmark"></span>
												</label>
												<label class="container_check">>$150<small>11</small>
													<input type="radio" name="dongia" value=">150">
													<span class="checkmark"></span>
												</label>
											</li>
										</ul>
										<input type="submit" class="w-100 form-control bg-primary text-white" name="submit">
									</div>
								</div>
							</div>
			</form>
			<!-- /dropdown -->
			<!-- end sắp xếp -->
		</div>
	</div>
	</div>
	</div>
	</div>
	<!-- /toolbox -->
	<!-- sản phẩm ---------------------------------------->
	<div class="container margin_30">
		<div class="row small-gutters">
			<?php foreach ($productnew as $key => $value) : ?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-<?= $value['giam_gia']; ?>%</span>
							<a href="<?= BASE_URL; ?>?act=product-detail&id=<?= $value['id'] ?>">
								<img class="img-fluid lazy" src="<?= explode(',', $value['hinh'])[0]; ?>" alt="">
							</a>
							<div data-countdown="2019/05/15" class="countdown"></div>
						</figure>
						<a href="<?= BASE_URL; ?>?act=product-detail&id=<?= $value['id'] ?>">
							<h3><?= $value['ten_hh']; ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?= ($value['giam_gia'] == 0) ? number_format($value['don_gia']) : number_format($value['don_gia'] * ((100 - $value['giam_gia']) / 100)); ?>VND</span>
							<?php if ($value['giam_gia'] > 0) { ?>
								<span class="old_price"><?= number_format($value['don_gia']) ?>VND</span>
							<?php } ?>
						</div>
						<ul>
							<li><a href="<?= BASE_URL. '?act=cart-add&&id=' . $value['id'] . '&soluong = 1'  ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào yêu thích"><i class="ti-heart"></i><span>Thêm vào yêu thích</span></a></li>
							<li><a href="<?= BASE_URL . '?act=cart-list' ?>" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
			<?php endforeach ?>
			<!-- /end sản phẩm ---------------------- -->
		</div>
		<!-- /row -->

		<div class="pagination__wrapper">
			<ul class="pagination">
				<?php ?>
				<li><a href="<?= BASE_URL ?>?act=products&page=<?= (($page - 1) > 0) ? $page - 1 : '1'; ?>" class="prev" title="previous page">&#10094;</a></li>
				<?php for ($i = 1; $i <= $sotrang; $i++) { ?>
					<li>
						<a href="<?= BASE_URL ?>?act=products&page=<?= $i ?>" class="<?= ($page == $i) ? 'active' : ''; ?>"><?= $i ?></a>
					</li>
				<?php } ?>
				<li><a href="<?= BASE_URL ?>?act=products&page=<?= (($page + 1) <= $sotrang) ? $page + 1 : '1'; ?>" class="next" title="next page">&#10095;</a></li>
			</ul>
		</div>

	</div>
	<!-- /end container -->
</main>