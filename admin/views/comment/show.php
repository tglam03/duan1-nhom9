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
                            <th>Nội dung</th>
                            <th>Người bình luận</th>
                            <th>Ngày bình luận</th>
                        </tr>
                    </thead>

                    <?php foreach ($comment as $comments) : ?>

                        <tbody>

                            <tr>
                                <td><?= $comments['id'] ?></td>
                                <td><?= $comments['ten_hh'] ?></td>
                                <td><?= $comments['noi_dung'] ?></td>
                                <td><span class="badge badge-warning"><?= $comments['user'] ?></span></td>
                                <td><?= $comments['ngay_bl'] ?></td>
                            </tr>

                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>