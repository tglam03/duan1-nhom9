<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update</h6>
        </div>
        <div class="card-body">


    <!-- thông báo thành công -->
            <?php if (isset($_SESSION['success'])) : ?>


                <div class="alert alert-success">
                   <?= $_SESSION['success'] ?>
                </div>

                 <?php unset($_SESSION['success']) ?>

            <?php endif; ?>
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

                <form class="user" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mt-3">
                                <label for="ho_ten" class="form-label">Họ và tên:</label>
                                <input type="text" class="form-control" value="<?= $users['ho_ten'] ?>" id="ho_ten" placeholder="Họ và tên" name="ho_ten">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="user" class="form-label">User:</label>
                                <input type="text" class="form-control" value="<?= $users['user'] ?>" id="user" placeholder="User(tên đăng nhập)" name="user">
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
                                    <option <?= $users['vai_tro'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                                    <option <?= $users['vai_tro'] == 0 ? 'selected' : null ?> value="0">Member</option>
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <p>Avatar:</p>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="hinh" name="hinh">
                                    <label name="hinh" class="custom-file-label" for="customFile">Choose file</label>
                                    <img src="<?= BASE_URL . $user['hinh'] ?>" width="100px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                                <input type="hidden" name="id" id="id">

                    <button type="submit" class="btn btn-info">Cập nhật</button>
                    <a href="<?= BASE_URL_ADMIN ?>/?act=users" class="btn btn-danger">Back to list</a>
                </form>

            </div>
        </div>
    </div>
