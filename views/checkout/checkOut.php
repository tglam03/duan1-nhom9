<main class="bg_gray">

	<form action="<?= BASE_URL . '?act=oder-purchase' ?>" method="post" enctype="multipart/form-data">
		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Danh mục</a></li>
						<li>Trang hoạt động</li>
					</ul>
				</div>
				<h1>Xác nhận thanh toán</h1>

			</div>
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>1. Thông tin người dùng và địa chỉ thanh toán</h3>
						<div class="tab-content checkout">
							<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
								<div class="form-group">
									<input type="email" name="user_email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" placeholder="Email">
									<span class=" text-warning"><?= (isset($errors['user_email']) && $errors['user_email'] != "") ? $errors['user_email'] : ''; ?></span>
								</div>
								<!-- <div class="form-group">
								<input type="password"  name="" class="form-control" placeholder="Mật khẩu">
							</div> -->
								<hr>
								<div class="row no-gutters">
									<div class="form-group">
										<input type="text" name="user_name" value="<?= $_SESSION['user']['ho_ten'] ?>" class="form-control" placeholder="Họ và tên">
									</div><span class=" text-warning"><?= (isset($errors['user_name']) && $errors['user_name'] != "") ? $errors['user_name'] : ''; ?></span>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="text" name="user_address" value="<?= $_SESSION['user']['diachi'] ?>" class="form-control" placeholder="Địa chỉ">
									<span class=" text-warning"><?= (isset($errors['user_address']) && $errors['user_address'] != "") ? $errors['user_address'] : ''; ?></span>
								</div>
								<!-- /row -->

								<!-- /row -->
								<div class="form-group">
									<input type="tel" name="user_phone" value="<?= $_SESSION['user']['dienthoai'] ?>" class="form-control" placeholder="Điện thoại">
									<span class=" text-warning"><?= (isset($errors['user_phone']) && $errors['user_phone'] != "") ? $errors['user_phone'] : ''; ?></span>
								</div>
								<hr>
								<hr>
							</div>
							<!-- /tab_1 -->
						</div>
					</div>
					<!-- /step -->
				</div>
				<!-- Thanh toán và vận chuyển------------------------- -->
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>2. Thanh toán và vận chuyển</h3>
						<ul>

							<li>
								<label class="container_radio">Thanh toán khi nhận hàng<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#status_payments_method"></a>
									<input type="radio" value="0" name="status_payment" checked>
									<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_radio">Thanh toán qua VNPAY<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#status_payments_method"></a>
									<input type="radio" value="1" name="status_payment">
									<span class="checkmark"></span>
								</label>
							</li>
						</ul>
						<!-- <div class="payment_info d-none d-sm-block">
							<figure><img src="img/cards_all.svg" alt=""></figure>
							<p>Nó nên được hiểu là sự co rút của các giác quan, để lỗi lầm của chúng tôi và của bạn đều không phải là một triết lý tốt hơn. Nhưng hầu như không có nguy hiểm gì. Thông thường tritani lúc đầu không phải là những định nghĩa đó.</p>
						</div> -->

						<h6 class="pb-2">Phương thức vận chuyển</h6>


						<ul>
							<li>
								<label class="container_radio">Giao hàng tiết kiệm<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
									<input type="radio" name="shipping" value="Giao hàng tiết kiệm" checked>
									<span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_radio">Giao hàng nhanh<a href="#0" class="info" data-bs-toggle="modal" data-bs-target="#payments_method"></a>
									<input type="radio" value="Giao hàng nhanh" name="shipping">
									<span class="checkmark"></span>
								</label>
							</li>

						</ul>

					</div>
					<!-- end Thanh toán và vận chuyển------------------------- -->

				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>3. Tóm tắt đơn hàng</h3>
						<div class="box_general summary">

							<table class="table  cart-list">
								<thead>
									<tr>
										<th>
											<span class=" text-danger">Sản phẩm</span>
										</th>
										<th>
											<span class=" text-danger">Giá</span>
										</th>
										<th>
											<span class=" text-danger">Số lượng</span>
										</th>

										<th>
											<span class=" text-danger">THÀNH TIỀN</span>
										</th>
									</tr>
								</thead>

								<!-- phần sản phẩm được thêm vào giỏ hàng -->
								<?php

								if (!empty($_SESSION['cart'])) :

									foreach ($_SESSION['cart'] as $key => $values) : ?>
										<tbody>
											<tr>
												<td>
													<div class="thumb_cart">
														<img src="<?= BASE_URL . explode(',', $values['hinh'])[0]
																	?>" width="100%" class="lazy" alt="Image">
													</div>
													<span class="item_cart"><?= $values['ten_hh'] ?></span>
												</td>
												<td>
													<strong><?= $total = number_format(((isset($values['giam_gia']) && $values['giam_gia'] == 0) ? $values['don_gia'] : (100 - $values['giam_gia']) / 100 * $values['don_gia']) * $values['mausize']['quantity']);

															?></strong>
												</td>
												<td><span><?= $values['mausize']['quantity'] ?></span></td>

												<td>
													<strong><?= $total = number_format(((isset($values['giam_gia']) && $values['giam_gia'] == 0) ? $values['don_gia'] : (100 - $values['giam_gia']) / 100 * $values['don_gia']) * $values['mausize']['quantity']); ?>
													</strong>
												</td>

											</tr>

										</tbody>

								<?php endforeach;
								endif;

								?>
							</table>
							<!-- <ul>
							<li class="clearfix"><em>1x Armor Air X Fear</em> <span>$145.00</span></li>
							<li class="clearfix"><em>2x Armor Air Zoom Alpha</em> <span>$115.00</span></li>
						</ul>
						<ul>
							<li class="clearfix"><em><strong>Tổng</strong></em> <span>$450.00</span></li>
							<li class="clearfix"><em><strong>Vận chuyển</strong></em> <span>$0</span></li>

						</ul> -->
							<div class="total clearfix">Thành tiền

								<span><?= caculator_total_oder() ?></span>

							</div>
							<button type="submit" class="btn_1 full-width">Đặt mua</button>
							<a href="<?= BASE_URL . '?act=products' ?>" onclick="return !confirm('Bạn chưa đặt mua sản phẩm. Bạn có chắc chắn muốn rời đi?')" class="btn_1 full-width">Quay lại trang sản phẩm</a>
						</div>
						<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
	</form>
	<!-- /container -->
</main>