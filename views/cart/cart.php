
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
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="img/abc2.jpg"class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Air x Fear</span>
									</td>
									<td>
										<strong>$140.00</strong>
									</td>
									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$140.00</strong>
									</td>
									<td class="options">
										<a href="#"><i class="ti-trash"></i></a>
									</td>
								</tr>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="img/abc2.jpg" class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Okwahn II</span>
									</td>
									<td>
										<strong>$110.00</strong>
									</td>
									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_2" class="qty2" name="quantity_2">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$110.00</strong>
									</td>
									<td class="options">
										<a href="#"><i class="ti-trash"></i></a>
									</td>
								</tr>
								<tr>
									<td>
										<div class="thumb_cart">
											<img src="img/abc2.jpg" class="lazy" alt="Image">
										</div>
										<span class="item_cart">Armor Air Wildwood ACG</span>
									</td>
									<td>
										<strong>$90.00</strong>
									</td>
									
									<td>
										<div class="numbers-row">
											<input type="text" value="1" id="quantity_3" class="qty2" name="quantity_3">
										<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
									</td>
									<td>
										<strong>$90.00</strong>
									</td>
									<td class="options">
										<a href="#"><i class="ti-trash"></i></a>
									</td>
								</tr>
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
										<div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
										<div class="col-md-4"><button type="button" class="btn_1 outline">Áp dụng phiếu giảm giá</button></div>
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
					<span>Thành tiền</span> $240.00
				</li>
				<li>
					<span>Phí ship</span> $7.00
				</li>
				<li>
					<span>Tổng thanh toán</span> $247.00
				</li>
			</ul>
			<a href="<?= BASE_URL ?>?act=checkout" class="btn_1 full-width cart">Tiến hành thanh toán</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		
	</main>
	<!--/main-->
	
	
	
	<div id="toTop"></div><!-- Back to top button -->
	


