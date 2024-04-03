<main class="bg_gray">
    <div class="container-fluid mt-5">
        <div class="container">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class=" d-flex card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cập nhật tài khoản</h6>
                    <div style="color: red;margin-left: 2%;">
                        <?= (isset($_SESSION['success']) && $_SESSION['success'] != "") ? $_SESSION['success'] : '';
                        unset($_SESSION['success']); ?>
                    </div>
                </div>
                <div class="card-body">
                    <!-- validate -->

                    <?php if (isset($_SESSION['errors'])) : ?>

                        <div class="alert alert-danger">
                            <ul>

                                <?php foreach ($_SESSION['errors'] as $error) : ?>

                                    <li><?= $error ?></li>

                                <?php endforeach; ?>
                            </ul>

                        </div>

                        <?php unset($_SESSION['errors']) ?>
                    <?php endif; ?>
                    <div class="d-flex">
                        <div class="col-sm-2">
                            <img style="vertical-align: middle;object-fit:cover" src="<?= BASE_URL . $users['hinh'] ?>" width="90%" alt="">
                        </div>
                        <div class="col-sm-10">
                            <form class="user mb-2" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 mt-3">
                                            <label for="ho_ten" class="form-label">Họ và tên:</label>
                                            <input type="text" class="form-control" value="<?= $users['ho_ten'] ?>" id="ho_ten" placeholder="Họ và tên" name="ho_ten">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="user" class="form-label">User:</label>
                                            <input type="text" class="form-control" value="<?= $users['user'] ?>" id="user" placeholder="User(tên đăng nhập)" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 mt-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" value="<?= $users['email'] ?>" id="email" placeholder=" Email" name="email">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="mat_khau" class="form-label">Mật khẩu:</label>
                                            <input type="text" class="form-control" value="<?= $users['mat_khau'] ?>" id="mat_khau" placeholder="Mật khẩu" name="mat_khau">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 mt-3">
                                            <label for="diachi" class="form-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" value="<?= $users['diachi'] ?>" id="diachi" placeholder="Địa chỉ" name="diachi">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="dienthoai" class="form-label">Số điện thoại:</label>
                                            <input type="tel" class="form-control" value="<?= $users['dienthoai'] ?>" id="dienthoai" placeholder="Số điện thoại" name="dienthoai">
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 mt-3">
                                            <label for="vai_tro" class="form-label">Vai trò:</label>
                                            <select class="form-control" id="vai_tro" name="vai_tro">
                                                <option <?= $users['vai_tro'] == 1 ? 'selected' : null ?> value="1">Admin
                                                </option>
                                                <option <?= $users['vai_tro'] == 0 ? 'selected' : null ?> value="0">Member
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3 mt-3">
                                            <p>Avatar:</p>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="customFile" name="hinh">
                                                <label name="hinh" class="custom-file-label" for="customFile">Choose
                                                    file</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="hinh" <?= $users['hinh'] ?>>
                                <input type="hidden" name="id" id="id" value="<?= $users['id'] ?>">

                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>