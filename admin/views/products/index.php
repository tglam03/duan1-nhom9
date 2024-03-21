<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?? '' ?>
        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>/?act=product-create">Thêm mới</a>
    </h1>
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
                            <th>Tên hàng hóa</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Hình ảnh</th>
                            <th>Loại sản phẩm</th>
                            <th>Màu, size và số lượng</th>
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
                            <th>Màu, size và số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['id']; ?></td>
                                <td><?= $product['ten_hh']; ?></td>
                                <td><?= $product['don_gia']; ?></td>
                                <td><?= $product['giam_gia']; ?></td>
                                <td>
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <?php $hinhs = $product['hinh'];
                                                    explode(',',$hinh);
                                                    foreach ($hinhs as $hinh) {
                                                        # code...
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                    <!-- Bootstrap JS -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
                                </td>
                                <td><?= $product['loai_id']; ?></td>
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>/?act=product-update&id=<?= $product['id'] ?>">Cập nhật</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>/?act=product-delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>