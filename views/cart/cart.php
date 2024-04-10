<main class="bg_gray">
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Danh mục</a></li>
					<li>Trang hoạt động</li>
				</ul>
			</div>
			<h1>Giỏ hàng</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
			<thead>
				<tr>
					<th>
						Sản phẩm
					</th>
					<th>
						Giá
					</th>
					<th>
						Màu
					</th>
					<th>
						Size
					</th>
					<th>
						Số lượng
					</th>
					<th>
						Thành tiền
					</th>
					<th>

					</th>
				</tr>
			</thead>

			<!-- phần sản phẩm được thêm vào giỏ hàng -->
			<tbody>
				<?php

				if (!empty($_SESSION['cart'])) :

					foreach ($_SESSION['cart'] as $key => $values) : ?>
						<tr>
							<td>
								<div class="thumb_cart">
									<img src="<?= BASE_URL . explode(',', $values['hinh'])[0]
												?>" class="lazy" alt="Image">
								</div>
								<span class="item_cart"><?= $values['ten_hh'] ?></span>
							</td>
							<td>
								<strong><?= $total = number_format(((isset($values['giam_gia']) && $values['giam_gia'] == 0) ? $values['don_gia'] : (100 - $values['giam_gia']) / 100 * $values['don_gia']) * $values['mausize']['quantity']);

										?></strong>
							</td>
							<td>
								<label class="container_check1">
									<span class="color-radio-button checkmark" style=" background-color:<?= $values['mausize']['mau']; ?>;border-radius: 50%;"></span>
								</label>
							</td>
							<td>
								<div>
									<span><?= $values['mausize']['size']; ?></span>
								</div>
							</td>
							<td>
								<div class="d-flex">
									<a href="<?= BASE_URL . '?act=cart-dec&productID=' . $values['id'] ?>" class="btn btn-danger">-</a>

									<span class="btn btn-warning"><?= $values['mausize']['quantity'] ?></span>

									<a href="<?= BASE_URL . '?act=cart-inc&productID=' . $values['id'] ?>" class="btn btn-success">+</a>
								</div>
							</td>
							<td>
								<strong><?= $total = number_format(((isset($values['giam_gia']) && $values['giam_gia'] == 0) ? $values['don_gia'] : (100 - $values['giam_gia']) / 100 * $values['don_gia']) * $values['mausize']['quantity']);

										?></strong>
							</td>
							<td>
								<a href="<?= BASE_URL . '?act=cart-delete&productID=' . $values['id'] ?>" onclick="return confirm('Bạn có chắc xóa không')" class="btn btn-danger">Xóa</a>
							</td>

						</tr>
				<?php endforeach;
				endif;

				?>
			</tbody>
		</table>

		<div class="row add_top_30 flex-sm-row-reverse cart_actions">
			<div class="col-sm-4 text-end">
				<button type="button" class="btn_1 gray">Cập nhật giỏ hàng </button>
			</div>
			<div class="col-sm-8">
				<div class="apply-coupon">
					<div class="form-group">
						<div class="row g-2">
							<div class="col-md-6">
								<div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCouponButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?= (isset($_SESSION['magg']['tenmagg']) && $_SESSION['magg']['tenmagg'] != "") ? $_SESSION['magg']['tenmagg'] : 'Chọn phiếu giảm giá' ?>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownCouponButton">
										<li><a class="dropdown-item" href="<?= BASE_URL ?>?act=cart-list&giam=1&magiamgia=">Trống</a></li>
										<?php foreach ($vocher as $vocher) { ?>
											<?php
											// Chuyển đổi ngày từ định dạng 'Y-m-d' sang 'Y/m/d' để so sánh
											$ngaybd = date('Y/m/d', strtotime($vocher['ngaybd']));
											$ngayketthuc = date('Y/m/d', strtotime($vocher['ngayketthuc']));
											?>
											<?php if (date('Y/m/d') >= $ngaybd && date('Y/m/d') <= $ngayketthuc) { ?>
												<li><a class="dropdown-item" href="<?= BASE_URL ?>?act=cart-list&giam=<?= $vocher['giam'] ?>&magiamgia=<?= $vocher['voucher'] ?>"><?= $vocher['voucher'] ?></a></li>
											<?php } ?>
										<?php } ?>

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /cart_actions -->

	</div>
	<!-- /container -->

	<div class="box_cart">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<ul>
						<li>
							<span>Thành tiền(VND)</span> <?= caculator_total_oder(true, 0, 0)  ?>
						</li>
						<li>
							<span>Phí ship(VND)</span> 7,000
						</li>
						<?php if (isset($_SESSION['magg']['giam']) && $_SESSION['magg']['giam'] != "") { ?>
							<li>
								<span>Mã giảm giá(VND)</span>-<?= number_format($_SESSION['magg']['giam']); ?>
							</li>
						<?php } ?>
						<li>
							<?php $giamgia = (isset($_SESSION['magg']['giam']) && $_SESSION['magg']['giam'] != "") ? $_SESSION['magg']['giam'] : 0; ?>
							<span>Tổng thanh toán(VND)</span> <?=caculator_total_oder(true, 7000, $giamgia) ?>
						</li>
					</ul>
					<a href="<?= BASE_URL ?>?act=oder-checkout" class="btn_1 full-width cart">Tiến hành thanh toán</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /box_cart -->

</main>
<!--/main-->



<div id="toTop"></div><!-- Back to top button -->