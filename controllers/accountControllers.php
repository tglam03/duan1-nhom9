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
                $_SESSION['saveuser'] = 1;
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
        header('Location:' . BASE_URL . '?act=account');
        exit();
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
    header('Location:'.BASE_URL.'');
}

function accountdeiltail($id)
{
    $users = showOne('khach_hang', $id);

    if (empty($users)) {
        e404();
    }
    $view = 'account/updateAccount';
    $style = 'account';


    if (!empty($_POST)) {

        $data = [
            "ho_ten"   => $_POST['ho_ten'] ?? null,
            "email"    => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat_khau'] ?? null,
            "diachi"   => $_POST['diachi'] ?? null,
            "dienthoai" => $_POST['dienthoai'] ?? null,
            "vai_tro"  => $_POST['vai_tro'] ?? null,
        ];
        // upload ảnh
        $avatar = (isset($_FILES['hinh']) && $_FILES['hinh']['size'] > 0) ? $_FILES['hinh'] : $_POST['hinh'];
        if (!empty($avatar)) {
            $data['hinh'] = upload_file($avatar, 'uploads/users/');
        }
        if (
            !empty($avatar)
            && !empty($users['hinh'])                      //Có upload file
            && !empty($data['hinh'])                       // Upload file thành công
            && file_exists(PATH_UPLOAD . $users['hinh'])
        )                                                   // Phải còn file tồn tại trên hệ thống
        {
            unlink(PATH_UPLOAD . $users['hinh']);
        }


        // validation
        $errors = validateUserUpdate($id, $data, $avatar);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('khach_hang', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công';

            header('Location: ' . BASE_URL .  '?act=account-deiltail&id='. $id);

            exit();
        }
    }
    require_once PATH_VIEW . 'layouts/client.php';
}


function validateUserUpdate($id, $data, $avatar)
{
    // tên - bắt buộc, độ dài tối đa 50 kí tự
    // email - bắt buộc phải nhập, không được trùng
    // password - bắt buộc phải có độ dài nhỏ nhât là 6 ?? null lớn nhất là 20
    // vai trò - bắt buộc, phải là 0 hoặc 1
    // địa chỉ - bắt bộc
    // số điện thoại - bắt buộc, check định dạng số điện thoại , phải đủ 10 số
    $errors = [];
    if (empty($data['ho_ten'])) {
        $errors[] = 'Họ tên bắt buộc phải nhập';
    } else if (strlen($data['ho_ten']) > 50) {
        $errors[] = 'Họ tên phải lớn hơn 50 kí tự';
    }

    // check email
    if (empty($data['email'])) {
        $errors[] = 'Email bắt buộc phải nhập';
    } else if (!checkUniqueEmailUpdate('khach_hang', $id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    } else if (!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email sai định dạng';
    }


    if (empty($data['mat_khau'])) {
        $errors[] = 'Mật khẩu bắt buộc phải nhập';
    } else if (strlen($data['mat_khau']) < 6 && strlen($data['mat_khau']) > 20) {
        $errors[] = 'Mật khẩu phải có độ dài nhỏ nhất là 8 và lớn nhất là 20';
    }

    if ($data['vai_tro'] === null) {
        $errors[] = 'Vai trò chưa được chọn';
    } else if (!in_array($data['vai_tro'], [0, 1])) {
        $errors[] = 'Vai trò phải chọn admin hoặc member';
    }

    if (empty($data['dienthoai'])) {
        $errors[] = "Số điện thoại không được để trống";
    } else if (!preg_match("/^[0-9]*$/", $data['dienthoai'])) {
        $errors[] = 'Số điện thoại không đúng định dạng';
    } else if (strlen($data['dienthoai']) != 10) {
        $errors[] = 'Số điện thoại phải đủ 10 chữ số';
    }
    if (empty($data['diachi'])) {
        $errors[] = 'Địa chỉ bắt buộc phải nhập';
    }
    if (is_array($avatar)) {
        if (!empty($avatar) && $avatar['size'] > 0) {
            $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

            if ($avatar['size'] > 2 * 1024 * 1024) {
                $errors[] = 'Hình ảnh phải có dung lượng nhỏ hơn 2M';
            } else if (!in_array($avatar['type'], $typeImage)) {
                $errors[] = 'Hình ảnh chỉ chấp nhận định dạng file: png, jpg, jpeg';
            }
        }
    }
    return $errors;
}
