<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?? '' ?>
        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=product-create">Thêm mới</a>
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
                        <?php
                        foreach ($products as $key => $product) : ?>
                            <tr>
                                <td><?= $product['id']; ?></td>
                                <td><?= $product['ten_hh']; ?></td>
                                <td><?= number_format($product['don_gia']); ?>VND</td>
                                <td><?= $product['giam_gia']; ?>%</td>
                                <td class=" col-sm-2">
                                    <div>
                                        <?php
                                        $hinhs = explode(',', $product['hinh'])[0];
                                        echo '  <div>
                                                                <img src="' . BASE_URL . $hinhs . '" style="width:100%">
                                                        </div>';
                                        ?>
                                    </div>
                                </td>
                                <td><?php
                                    if (isset($product['loai_id']) && !empty($product['loai_id']) && is_array($category)) {
                                        foreach ($category as $cat) {
                                            if ($cat['id'] == $product['loai_id']) {
                                                echo $cat['ten_loai'];
                                                break;
                                            }
                                        }
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <div class="btn btn-success btn-sm mr-2">Màu</div>
                                            <?php
                                            $mau_size_soluongs = $product['mau_size_soluong'];
                                            extract($mau_size_soluongs);
                                            $maus = explode(',', $mau);
                                            foreach ($maus as $mau) { ?>
                                                <div class="btnhinhtron mr-1" style="background-color:<?= $mau; ?>;"></div>
                                            <?php }; ?>
                                        </div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <div class="btn btn-success btn-sm mr-2">Size</div>
                                            <?php $sizes = explode(',', $size);
                                            $dem = 0;
                                            $phay = ',';
                                            for ($i = 0; $i < sizeof($sizes); $i++) {
                                                $dem++;
                                                if ($dem == sizeof($sizes)) {
                                                    $phay = '.';
                                                }
                                            ?>
                                                <p class="mr-1"><?= $sizes[$i] ?><?= $phay; ?></p>
                                            <?php  }; ?>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-success btn-sm mr-2">Slượng</div>
                                            <p class="mr-1"><?= $soluong; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=product-update&id=<?= $product['id'] ?>">Cập nhật</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=product-delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>