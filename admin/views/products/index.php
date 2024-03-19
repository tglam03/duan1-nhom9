<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?? '' ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Hình ảnh</th>
                            <th>Loại sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Hình ảnh</th>
                            <th>Loại sản phẩm</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($products as $product) : ?>
                        <tr>
                            <td><?=$product['id'] ;?></td>
                            <td><?=$product['ten_hh'] ;?></td>
                            <td><?=$product['don_gia'] ;?></td>
                            <td><?=$product['giam_gia'] ;?></td>
                            <td><img src="<?=$product['hinh'] ;?>" alt=""></td>
                            <td><?=$product['loai_id'] ;?></td>
                            <td class="d-flex justify-content-around">
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-update&id=<?= $product['id']; ?>" class="btn btn-dark">Sửa</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-delete&id=<?= $product['id']; ?>" class="btn btn-dark">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>