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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($products as $product) : ?>

                        <tbody>

                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['ten_hh'] ?></td>
                                <td class="col-sm-3"><img style=" width:80%" src="<?= BASE_URL . explode(',', $product['hinh'])[0] ?>" alt=""></td>
                                <td>
                                    <a class="btn btn-info mt-1" href="<?= BASE_URL_ADMIN ?>?act=comment-detail&id=<?= $product['id'] ?>">Xem chi tiết</a>
                                </td>

                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>