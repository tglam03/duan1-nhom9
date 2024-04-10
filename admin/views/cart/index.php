<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>



    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <?php if (isset($_SESSION['success'])) : ?>


            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>

            <?php unset($_SESSION['success']) ?>

        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền hàng</th>
                            <th>Shipping</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái thanh toán</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carts as $cart) : ?>
                            <tr>
                                <td><?= $cart['id'] ?></td>
                                <td><?= $cart['user_name'] ?></td>
                                <td><?= $cart['user_email'] ?></td>
                                <td><?= $cart['user_phone'] ?></td>
                                <td><?= $cart['user_address'] ?></td>
                                <td><?= number_format($cart['total_bill'])  ?>VND</td>
                                <td><?= $cart['shipping'] ?></td>
                                <td class="col-sm-2">
                                    <span class=" text-info">
                                        <?= ($cart['status_delivery'] == 0) ? '<span class="badge badge-warning">Chờ xác nhận</span>' : ($cart['status_delivery'] == 1 ? '<span class="badge badge-primary">Chờ lấy hàng</span>' : ($cart['status_delivery'] == 2 ? '<span class="badge badge-info">Đang giao hàng</span>' : ($cart['status_delivery'] == 3 ? '<span class="badge badge-success">Đã giao</span>' : ($cart['status_delivery'] == -1 ? '<span class="badge badge-danger">Đã hủy</span>' : '')))) ?>
                                    </span>
                                </td>


                                <td> <?= ($cart['thanhtoan']  == 0) ? '<span class="badge badge-warning">Chưa thanh toán</span>' : ($cart['thanhtoan'] == 1 ? '<span class="badge badge-success">Đã thanh toán</span>' : ($cart['status_delivery'] == -1 ? '<span class="badge badge-danger">Đơn hàng đã hủy</span>' : '')) ?></td>



                                <td>
                                    <a class="btn btn-info mt-1" href="<?= BASE_URL_ADMIN ?>?act=cart-detail&id=<?= $cart['id'] ?>">Xem chi tiết</a>
                                    <?php if ($cart['status_delivery'] != -1 && $cart['status_delivery'] != 3) { ?>
                                        <a class="btn btn-warning mt-1" href="<?= BASE_URL_ADMIN ?>?act=cart-update&id=<?= $cart['id'] ?>">Cập nhật</a>
                                    <?php } ?>
                                    <?php if ($cart['status_delivery'] == 0) { ?>
                                        <a class="btn btn-danger mt-1" href="<?= BASE_URL_ADMIN ?>?act=cart-delete&id=<?= $cart['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Hủy bỏ đơn hàng</a>
                                    <?php } ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>