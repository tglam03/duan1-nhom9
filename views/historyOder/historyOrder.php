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
        <!-- /page_header -->
        <table class="table table-striped">
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
                        Tình trạng đơn hàng
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>

            <!-- phần sản phẩm được thêm vào giỏ hàng -->
            <?php

            if (!empty($historyOder)) :

                foreach ($historyOder as $key => $values) : ?>
                    <tbody>
                        <tr>
                            <td class="col-sm-5">
                                <div class="thumb_cart">
                                    <img src="<?= BASE_URL . explode(',', $values['hinh'])[0]
                                                ?>" class="lazy" alt="Image">
                                </div>
                                <span class="item_cart"><?= $values['ten_hh'] ?></span>
                            </td>
                            <td class="col-sm-1">
                                <strong><?= number_format($values['giam_gia'] ?: $values['don_gia']);

                                        ?></strong>
                            </td>
                            <td class="col-sm-0">
                                <label class="container_check1">
                                    <span class="color-radio-button checkmark" style=" background-color:<?= $values['mau']; ?>;border-radius: 50%;"></span>
                                </label>
                            </td>
                            <td class="col-sm-0">
                                <div>
                                    <span><?= $values['size']; ?></span>
                                </div>
                            </td>
                            <td class="col-sm-1">
                                <div>
                                    <span><?= $values['quantity'] ?> sản phẩm</span>
                                </div>
                            </td>
                            <td class="col-sm-1">
                                <strong><?= $total = number_format((isset($values['giam_gia']) && $values['giam_gia'] != 0) ? ((100 - $values['giam_gia']) * $values['don_gia'] / 100) : ($values['don_gia']) * $values['quantity']);

                                        ?>VND</strong>
                            </td>
                            <td class="col-sm-2">
                                <span class=" text-danger"><?= ($values['trangthaidh'] == 0) ? 'Chờ xác nhận' : ($values['trangthaidh'] == 1 ? 'Chờ lấy hàng' : ($values['trangthaidh'] == 2 ? 'Đang giao hàng' : ($values['trangthaidh'] == 3 ? 'Đã giao' : ($values['trangthaidh'] == -1 ? 'Đã hủy' : '')))) ?></span>
                            </td>
                            <td class="col-sm-2">
                                <?php if ($values['trangthaidh'] == 0) { ?>
                                    <a href="<?= BASE_URL . '?act=orderCancel&ID=' . $values['id_order'] ?>" onclick="return confirm('Bạn có chắc hủy không')" class="btn btn-danger">Hủy đơn hàng</a>
                                <?php } elseif ($values['trangthaidh'] == -1) { ?>
                                    <a class="btn btn-danger">Đã hủy</a>
                                <?php } ?>
                            </td>


                        </tr>

                    </tbody>

            <?php endforeach;
            endif;

            ?>
        </table>
        <!-- /cart_actions -->
    </div>
    <!-- /container -->
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
</main>
<!--/main-->



<div id="toTop"></div><!-- Back to top button -->