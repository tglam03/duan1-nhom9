<?php

//Create an instance; passing `true` enables exceptions
function account()
{
    $title = 'Account';
    $view = 'account/account';
    $style = 'account';
    if (isset($_POST['dangky']) && $_POST['dangky']) {

        $data = [
            "ho_ten"   => $_POST['ho_ten'] ?? null,
            "user"     => $_POST['user'] ?? null,
            "email"    => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat_khau'] ?? null,
            "diachi"   => $_POST['diachi'] ?? null,
            "dienthoai" => $_POST['dienthoai'] ?? null,
        ];
        // validation
        $errors = validateUserCreate($data);
        if (!empty($errors)) {
        } else {
            if (isset($_POST['checked']) && $_POST['checked']) {
                insert('khach_hang', $data);
                $_SESSION['success'] = 'Đăng ký thành công vui lòng đăng nhập!';
                header('Location: ' . BASE_URL . '?act=account');
                exit();
            } else {
                $errors['checked'] = "Đồng ý với điều khoản để đăng ký";
            }
        }
        // end validation
    }
    if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
        $errors = [];
        $user = getUserAdminByUserAndPassword($_POST['userdn'], $_POST['mkdn']);
        // check lỗi nếu không đúng sẽ quay về trnag login
        if (empty($user)) {
            $errors['loidn'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
        } else {
            $_SESSION['user'] = $user;
            if (isset($_POST['checkeddn']) && $_POST['checkeddn']) {
                $_SESSION['saveuser'] = $user;
            }
            // nếu đúng sẽ chạy sang trang admin
            header('Location: ' . BASE_URL);
            exit();
        }
    }
    if (isset($_POST['datlaimk']) && $_POST['datlaimk']) {
        $errors = [];
        if (empty($_POST['email_forgot'])) {
            $errors['email_forgot'] = 'Email bắt buộc phải nhập';
        } else if (!filter_var($_POST['email_forgot'],  FILTER_VALIDATE_EMAIL)) {
            $errors['email_forgot'] = 'Email sai định dạng';
        }
        if (empty($errors)) {
            $mat_khau = loadAccountToEmail($_POST['email_forgot']);
            $to_email = $_POST['email_forgot'];
            $headers = "From: Allaiasupport@gmail.com<br>";
            sendemail($headers, $to_email, $mat_khau);
        }
        header('Location:'.BASE_URL.'?act=account');
    }
    require_once PATH_VIEW . 'layouts/client.php';
}

function validateUserCreate($data)
{
    // tên - bắt buộc, độ dài tối đa 50 kí tự
    // email - bắt buộc phải nhập, không được trùng
    // password - bắt buộc phải có độ dài nhỏ nhât là 6 ?? null lớn nhất là 20
    // vai trò - bắt buộc, phải là 0 hoặc 1
    // địa chỉ - bắt bộc
    // số điện thoại - bắt buộc, check định dạng số điện thoại , phải đủ 10 số
    $errors = [];
    if (empty($data['user'])) {
        $errors['user'] = 'Tên đăng nhập bắt buộc phải nhập';
    } else if (strlen($data['user']) < 8) {
        $errors['user'] = 'Tên đăng nhập dài tối thiểu 8 ký tự';
    }
    if (empty($data['ho_ten'])) {
        $errors['ho_ten'] = 'Họ tên bắt buộc phải nhập';
    } else if (strlen($data['ho_ten']) < 10) {
        $errors['ho_ten'] = 'Họ tên dài tối thiểu 10 ký tự';
    }

    // check email
    if (empty($data['email'])) {
        $errors['email'] = 'Email bắt buộc phải nhập';
    } else if (!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email sai định dạng';
    } else if (!checkUniqueEmail('khach_hang', $data['email'])) {
        $errors['email'] = 'Email đã được sử dụng';
    }


    if (empty($data['mat_khau'])) {
        $errors['mat_khau'] = 'Mật khẩu bắt buộc phải nhập';
    } else if (strlen($data['mat_khau']) < 8 && strlen($data['mat_khau']) > 20) {
        $errors['mat_khau'] = 'Mật khẩu phải có độ dài nhỏ nhất là 8 và lớn nhất là 20';
    }

    if (empty($data['dienthoai'])) {
        $errors['dienthoai'] = "Số điện thoại không được để trống";
    } else if (!preg_match("/^[0-9]*$/", $data['dienthoai'])) {
        $errors['dienthoai'] = 'Số điện thoại không đúng định dạng';
    } else if (strlen($data['dienthoai']) != 10) {
        $errors['dienthoai'] = 'Số điện thoại phải đủ 10 chữ số';
    }
    if (empty($data['diachi'])) {
        $errors['diachi'] = 'Địa chỉ bắt buộc phải nhập';
    }
    return $errors;
}

function singout()
{
    if (isset($_GET['thoat'])) {
        $_SESSION['thoat'] = 1;
    }
    if (isset($_GET['dangnhap'])) {
        if (isset($_SESSION['thoat']) && $_SESSION['thoat'] = 1) {
            unset($_SESSION['thoat']);
        }
    }
    if (isset($_GET['dangxuat'])) {
        if (isset($_SESSION['saveuser']) && !empty($_SESSION['saveuser'])) {
            unset($_SESSION['saveuser']);
        }
        unset($_SESSION['user']);
    }
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
