<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="ho_ten" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="user" class="form-label">User:</label>
                            <input type="text" class="form-control" id="user" placeholder="User(tên đăng nhập)" name="user">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder=" Email" name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mat_khau" class="form-label">Mật khẩu:</label>
                            <input type="mat_khau" class="form-control" id="mat_khau" placeholder="Mật khẩu" name="mat_khau">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="diachi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="diachi">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="dienthoai" class="form-label">Số điện thoại:</label>
                            <input type="tel" class="form-control" id="dienthoai" placeholder="Số điện thoại" name="dienthoai">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3 mt-3">
                            <label for="vai_tro" class="form-label">Vai trò:</label>
                            <select class="form-control" id="vai_tro" name="vai_tro">
                                <option value="1">Admin</option>
                                <option value="0">Member</option>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <p>Avatar:</p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="hinh" name="hinh">
                                <label name="hinh" class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>








                <button type="submit" class="btn btn-info">Thêm mới</button>
                <a href="<?= BASE_URL_ADMIN ?>/?act=users" class="btn btn-danger">Back to list</a>
            </form>

        </div>
    </div>
</div>