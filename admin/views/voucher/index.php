<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>/?act=voucher-create">Thêm mới</a>


    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>


                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>

                <?php unset($_SESSION['success']) ?>

            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Voucher</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Tên sản phẩm</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php foreach ($vouchers as $voucher) : ?>

                        <tbody>

                            <tr>
                                <td><?= $voucher['id'] ?></td>
                                <td><?= $voucher['voucher'] ?></td>
                                <td><?= $voucher['ngaybd'] ?></td>
                                <td><?= $voucher['ngayketthuc'] ?></td>
                                <td><?= number_format($voucher['giam']) ?> VND</td>
                                <td>
                                    <a class="btn btn-warning mt-1" href="<?= BASE_URL_ADMIN ?>?act=vocher-update&id=<?= $voucher['id'] ?>">Cập nhật</a>
                                    <a class="btn btn-danger mt-1" href="<?= BASE_URL_ADMIN ?>?act=vocher-delete&id=<?= $voucher['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>

                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>