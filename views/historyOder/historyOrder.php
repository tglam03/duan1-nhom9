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
            <h1>Lịch sử mua hàng</h1>
        </div>
        <?php $history = (isset($historyOder) && !empty($historyOder)) ? $historyOder :((isset($historyOder1) && !empty($historyOder1)) ? $historyOder1 : ''); ?>
        <!-- /page_header -->
        <table class="table table-striped">
            <thead>
                <?php
                if ($history == $historyOder || $history == '') { ?>
                    <tr>
                        <th>
                            Mã hóa đơn
                        </th>
                        <th>
                            Tên khách hàng
                        </th>
                        <th>
                            Số điện thoại
                        </th>
                        <th>
                            Địa chỉ
                        </th>
                        <th>
                            Thanh toán
                        </th>
                        <th>
                            Phương thức thanh toán
                        </th>
                        <th>
                            Thành tiền
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                <?php } else { ?>
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
                            Tình trạng đơn hàng
                        </th>
                        <th>

                        </th>
                    </tr>
                <?php } ?>
            </thead>

            <!-- phần sản phẩm được thêm vào giỏ hàng -->
            <tbody>
                <?php
                if (!empty($history)) :
                    foreach ($history as $key => $values) : ?>
                        <?php if ($history == $historyOder || $history=='') { ?>
                            <tr>
                                <td>
                                    <span class="item_cart">OD-<?= $values['id'] ?></span>
                                </td>
                                <td><?= $values['user_name']; ?></td>
                                <td><?= $values['user_phone']; ?></td>
                                <td><?= $values['user_address']; ?></td>
                                <td>
                                    <div>
                                        <span><?= ($values['thanhtoan'] == 0) ? 'Chưa thanh toán' : ($values['thanhtoan'] == 1 ? 'Đã thanh toán' : '') ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><?= ($values['status_payment'] == 0) ? 'Thanh toán khi nhận hàng' : ($values['status_payment'] == 1 ? 'Thanh toán qua VNPay' : '') ?></span>
                                    </div>
                                </td>
                                <td>
                                    <strong><?= $total = number_format($values['total_bill']);

                                            ?>VND</strong>
                                </td>
                                <td>
                                    <span class=" text-danger">
                                        <?= ($values['status_delivery'] == 0) ? 'Chờ xác nhận' : ($values['status_delivery'] == 1 ? 'Chờ lấy hàng' : ($values['status_delivery'] == 2 ? 'Đang giao hàng' : ($values['status_delivery'] == 3 ? 'Đã giao' : ($values['status_delivery'] == -1 ? 'Đã hủy' : '')))) ?></span>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL . '?act=orderhistory&idorder=' . $values['id'] ?>" class="btn btn-warning">Chi tiết</a>
                                    <?php if ($values['status_delivery'] == 0) { ?>
                                        <a href="<?= BASE_URL . '?act=orderCancel&ID=' . $values['id'] ?>" onclick="return confirm('Bạn có chắc hủy không')" class="btn btn-danger">Hủy đơn</a>
                                    <?php } elseif ($values['status_delivery'] == -1) { ?>
                                        <a class="btn btn-danger">Đã hủy</a>
                                    <?php } ?>
                                </td>


                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="<?= BASE_URL . explode(',', $values['hinh'])[0]
                                                    ?>" class="lazy" alt="Image">
                                    </div>
                                    <span class="item_cart"><?= $values['ten_hh'] ?></span>
                                </td>
                                <td>
                                    <strong><?= number_format($values['giam_gia'] ?: $values['don_gia']);

                                            ?></strong>
                                </td>
                                <td>
                                    <label class="container_check1">
                                        <span class="color-radio-button checkmark" style=" background-color:<?= $values['mau']; ?>;border-radius: 50%;"></span>
                                    </label>
                                </td>
                                <td>
                                    <div>
                                        <span><?= $values['size']; ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><?= $values['quantity'] ?> sản phẩm</span>
                                    </div>
                                </td>
                                <td>
                                    <strong><?= $total = number_format((isset($values['giam_gia']) && $values['giam_gia'] != 0) ? ((100 - $values['giam_gia']) * $values['don_gia'] / 100) : ($values['don_gia']) * $values['quantity']);

                                            ?>VND</strong>
                                </td>
                                <td><a class="btn btn-danger" href="<?= BASE_URL . '?act=orderhistory' ?>">Quay lại</a></td>
                            </tr>
                        <?php } ?>
                <?php endforeach;
                endif;
                ?>
            </tbody>
        </table>
        <!-- /cart_actions -->
    </div>
    <!-- /container -->
    <?php if (isset($sotrang) && !empty($sotrang)) { ?>
        <div class="pagination__wrapper">
            <ul class="pagination">
                <?php ?>
                <li><a href="<?= BASE_URL ?>?act=orderhistory&page=<?= (($page - 1) > 0) ? $page - 1 : '1'; ?>" class="prev" title="previous page">&#10094;</a></li>
                <?php for ($i = 1; $i <= $sotrang; $i++) { ?>
                    <li>
                        <a href="<?= BASE_URL ?>?act=orderhistory&page=<?= $i ?>" class="<?= ($page == $i) ? 'active' : ''; ?>"><?= $i ?></a>
                    </li>
                <?php } ?>
                <li><a href="<?= BASE_URL ?>?act=orderhistory&page=<?= (($page + 1) <= $sotrang) ? $page + 1 : '1'; ?>" class="next" title="next page">&#10095;</a></li>
            </ul>
        </div>
    <?php } ?>
</main>
<!--/main-->



<div id="toTop"></div><!-- Back to top button -->