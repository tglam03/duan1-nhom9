<?php

function userListAll()
{

    $title = 'Danh sách khách hàng';
    $view = 'user/index';
    $script = 'datatable';
    $script2 = 'user/script';
    $style = 'datatable';

    $users = listAll('khach_hang');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userShowOne($id)
{


    $users = showOne('khach_hang', $id);

    if (empty($users)) {
        e404();
    }


    $title = 'Chi tiết khách hàng: ' . $users['ho_ten'];
    $view = 'user/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Danh sách khách hàng';
    $view = 'user/create';

    if (!empty($_POST)) {

        $data = [
            "ho_ten"   => $_POST['ho_ten'] ?? null,
            "user"     => $_POST['user'] ?? null,
            "email"    => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat_khau'] ?? null,
            "diachi"   => $_POST['diachi'] ?? null,
            "dienthoai" => $_POST['dienthoai'] ?? null,
            "vai_tro"  => $_POST['vai_tro'] ?? null,
        ];

        // validation
        $errors = validateCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;


            header('Location: ' . BASE_URL_ADMIN .  '?act=users-create');
            exit();
        }

        // end validation


        $avatar = $_FILES['hinh'] ?? null;
        if (!empty($avatar)) {
            $data['hinh'] = upload_file($avatar, 'uploads/users');
        }

        insert('khach_hang', $data);
        $_SESSION['success'] = 'Thêm mới thành công';
        header('Location: ' . BASE_URL_ADMIN .  '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreate($data)
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
    } else if (!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email sai định dạng';
    } else if (!checkUniqueEmail('khach_hang', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
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


    return $errors;
}
function userUpdate($id)
{
    $users = showOne('khach_hang', $id);

    if (empty($users)) {
        e404();
    }

    $title = 'Cập nhật khách hàng: ' . $users['ho_ten'];
    $view = 'user/update';


    if (!empty($_POST)) {

        $data = [
            "ho_ten"   => $_POST['ho_ten'] ?? null,
            "user"     => $_POST['user'] ?? null,
            "email"    => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat_khau'] ?? null,
            "diachi"   => $_POST['diachi'] ?? null,
            "dienthoai" => $_POST['dienthoai'] ?? null,
            "vai_tro"  => $_POST['vai_tro'] ?? null,
        ];
        // upload ảnh
        $avatar = $_FILES['hinh'] ?? null;
        if (!empty($avatar)) {
            $data['hinh'] = upload_file($avatar, 'uploads/users');
        }
        if (
            !empty($avatar)
            && !empty($users['hinh'])                      //Có upload file
            && !empty($data['hinh'])                       // Upload file thành công
            && file_exists(PATH_UPLOAD . $users['hinh'])
        )  // Phải còn file tồn tại trên hệ thống
        {
            unlink(PATH_UPLOAD . $users['hinh']);
        }


        // validation
        $errors = validateUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;


            header('Location: ' . BASE_URL_ADMIN .  '?act=users-update');
            exit();
        } else {
            update('khach_hang', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công';
        }

        // end validation



        header('Location: ' . BASE_URL_ADMIN .  '?act=users-update&id=' . $id);

        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validateUpdate($id, $data)
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
    }
    else if (!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)) {
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


    return $errors;
}



function userDelete($id)
{
    delete2('khach_hang', $id);
    $_SESSION['success'] = 'Xóa thành công';
    header('Location: ' . BASE_URL_ADMIN .  '?act=users');

    exit();
}




