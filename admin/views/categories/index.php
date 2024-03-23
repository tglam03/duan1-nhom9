<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>/?act=category-create">Thêm mới</a>


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
                            <th>Tên loại</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($category as $categorys) : ?>

                        <tbody>

                            <tr>
                                <td><?= $categorys['id'] ?></td>
                                <td><?= $categorys['ten_loai'] ?></td>
                                

                                <td>
                                    <a class="btn btn-info mt-1" href="<?= BASE_URL_ADMIN ?>?act=category-detail&id=<?= $categorys['id'] ?>">Xem chi tiết</a>
                                    <a class="btn btn-warning mt-1" href="<?= BASE_URL_ADMIN ?>?act=category-update&id=<?= $categorys['id'] ?>">Cập nhật</a>
                                    <a class="btn btn-danger mt-1" href="<?= BASE_URL_ADMIN ?>?act=category-delete&id=<?= $categorys['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                </td>

                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>