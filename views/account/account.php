<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li>Trang hoạt động</li>
                </ul>
            </div>
            <h1>Đăng nhập hoặc đăng ký</h1>
        </div>
        <!-- /page_header -->
        <form action="<?= BASE_URL ?>?act=account" method="post">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Đăng nhập</h3>
                        <div class="form_container">
                            <div class="row no-gutters">
                                <div class="col-lg-6 pr-lg-1">
                                    <a href="#0" class="social_bt facebook">Đăng nhập với Facebook</a>
                                </div>
                                <div class="col-lg-6 pl-lg-1">
                                    <a href="#0" class="social_bt google">Đăng nhập với Google</a>
                                </div>
                            </div>
                            <div class="divider"><span>Hoặc</span></div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= (isset($_POST['userdn']) && !empty($_POST['userdn'])) ? $_POST['userdn'] : '' ?>" name="userdn" id="userdn" placeholder="Tên đăng nhập*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" value="<?= (isset($_POST['mkdn']) && !empty($_POST['mkdn'])) ? $_POST['mkdn'] : '' ?>" name="mkdn" id="mkdn" value="" placeholder="Mật khẩu*">
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Ghi nhớ tài khoản
                                        <input type="checkbox" name="checkeddn">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="javascript:void(0);">Quên mật khẩu</a></div>
                            </div>
                            <span class=" text-warning"><?= (isset($errors['loidn']) && $errors['loidn'] != "") ? $errors['loidn'] : ''; ?></span>
                            <div class="text-center"><input type="submit" name="dangnhap" value="Đăng nhập" class="btn_1 full-width"></div>
                            <div id="forgot_pw">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Nhập email của bạn">
                                </div>
                                <p>Mật khẩu sẽ sớm được gửi đến</p>
                                <span class=" text-warning"><?= (isset($errors['email_forgot']) && $errors['email_forgot'] != "") ? $errors['email_forgot'] : ''; ?></span>
                                <div class="text-center"><input type="submit" name="datlaimk" value="Đặt lại mật khẩu" class="btn_1"></div>
                            </div>
                        </div>
                        <!-- /end đăng nhập form_container -->
                    </div>
                    <!-- /box_account -->
                    <div class="row">
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Tìm kiếm vị trí</li>
                                <li>Kiểm tra vị trí</li>
                                <li>Bảo vệ dữ liệu</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Thanh toán an toàn</li>
                                <li>Hỗi trợ 24/24</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- Đăng ký ------------------->
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Bắt buộc</small>
                        <div class="form_container">
                            <div style="color: red;">
                                <?= (isset($_SESSION['success']) && $_SESSION['success'] != "") ? $_SESSION['success'] : '';
                                unset($_SESSION['success']); ?>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= (isset($_POST['user']) && !empty($_POST['user'])) ? $_POST['user'] : '' ?>" name="user" placeholder="Tên đăng nhập*">
                                    <span class=" text-warning"><?= (isset($errors['user']) && $errors['user'] != "") ? $errors['user'] : ''; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" value="<?= (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : '' ?>" name="email" id="email_2" placeholder="Email*">
                                <span class=" text-warning"><?= (isset($errors['email']) && $errors['email'] != "") ? $errors['email'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" value="<?= (isset($_POST['mat_khau']) && !empty($_POST['mat_khau'])) ? $_POST['mat_khau'] : '' ?>" name="mat_khau" id="mat_khau" value="" placeholder="Mật khẩu*">
                                <span class=" text-warning"><?= (isset($errors['mat_khau']) && $errors['mat_khau'] != "") ? $errors['mat_khau'] : ''; ?></span>
                            </div>
                            <hr>
                            <div class="private box">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" value="<?= (isset($_POST['ho_ten']) && !empty($_POST['ho_ten'])) ? $_POST['ho_ten'] : '' ?>" class="form-control" name="ho_ten" placeholder="Họ và tên*">
                                            <span class=" text-warning"><?= (isset($errors['ho_ten']) && $errors['ho_ten'] != "") ? $errors['ho_ten'] : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" value="<?= (isset($_POST['diachi']) && !empty($_POST['diachi'])) ? $_POST['diachi'] : '' ?>" class="form-control" name="diachi" placeholder="Địa chỉ*">
                                            <span class=" text-warning"><?= (isset($errors['diachi']) && $errors['diachi'] != "") ? $errors['diachi'] : ''; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-12 pl-1">
                                        <div class="form-group">
                                            <input type="text" value="<?= (isset($_POST['dienthoai']) && !empty($_POST['dienthoai'])) ? $_POST['dienthoai'] : '' ?>" class="form-control" name="dienthoai" placeholder="Điện thoại *">
                                            <span class=" text-warning"><?= (isset($errors['dienthoai']) && $errors['dienthoai'] != "") ? $errors['dienthoai'] : ''; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="container_check">Đồng ý <a href="#0">Điều khoản sử dụng</a>
                                    <input type="checkbox" name="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class=" text-warning"><?= (isset($errors['checked']) && $errors['checked'] != "") ? $errors['checked'] : ''; ?></span>
                            </div>
                            <div class="text-center"><input type="submit" name="dangky" value="Đăng ký" class="btn_1 full-width"></div>
                        </div>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                </div>
        </form>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
</main>