<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Các sản phẩm đã đặt</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã hàng hóa</th>
                            <th>Hình ảnh</th>
                            <th>Tên hàng hóa</th>
                            <th>Số lượng</th>
                            <th>Lợi nhuận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($carts)) : ?>

                            <?php foreach ($carts as $keycarts => $carts) : ?>
                                <tr>
                                    <td><?= $keycarts + 1 ?></td>
                                    <td class="col-sm-2">HH-<?= $carts['product_id'] ?></td>
                                    <td class="col-sm-2">
                                        <img style="width:60%;" src="<?= BASE_URL . explode(',', $carts['hinh'])[0]
                                                                        ?>" class="lazy" alt="Image">
                                    </td>
                                    <td class="col-sm-4">
                                        <span class="item_cart"><?= $carts['ten_hh'] ?></span>
                                    </td>
                                    <td class="col-sm-2">
                                        <div>
                                            <span><?= $carts['total_quantity']; ?> sản phẩm</span>
                                        </div>
                                    </td>
                                    <td class="col-sm-2">
                                        <strong><?= $total = number_format($carts['tienthu']);

                                                ?>VND</strong>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="<?= BASE_URL_ADMIN ?>/?act=cart" class="btn btn-danger">Back to list</a>
    </div>
</div>