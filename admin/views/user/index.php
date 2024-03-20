<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>

        <a class="btn btn-info"
         href="<?= BASE_URL_ADMIN ?>/?act=users-create">Thêm mới</a>


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
                            <th>Họ tên</th>
                            <th>User(Tên đăng nhập)</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($users as $user) : ?>

                        <tbody>

                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['ho_ten'] ?></td>
                                <td><?= $user['user'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><img src="<?= $user['hinh'] ?>" alt=""> </td>
                                <td><?= $user['diachi'] ?></td>
                                <td><?= $user['dienthoai'] ?></td>
                                <td><?= $user['vai_tro'] ?
                                        '<span class="badge badge-success">Admin</span>' :
                                        ' <span class="badge badge-warning">Member</span>' ?>
                                </td>

                                <td>

                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>/?act=users-detail&id=<?= $user['id'] ?>">Xem chi tiết</a>

                                </td>
                            </tr>
                        </tbody>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

</div>