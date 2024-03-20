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
            "ho_ten"   => $_POST['ho_ten'],
            "user"     => $_POST['user'],
            "email"    => $_POST['email'],
            "mat_khau" => $_POST['mat_khau'],
            "diachi"   => $_POST['diachi'],
            "dienthoai" => $_POST['dienthoai'],
            "vai_tro"  => $_POST['vai_tro'],
        ];

        // validation
            $errors = validateCreate($data);
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            $_SESSION['errors'] = $data ;

            
        header('Location: ' . BASE_URL_ADMIN .  '?act=users');
        exit();

        }

        // end validation


        $avatar = $_FILES['hinh'] ?? null;
        if (!empty($avatar)) {
            $data['hinh'] = upload_file($avatar, 'uploads/users');
        }

        insert('khach_hang', $data);

        header('Location: ' . BASE_URL_ADMIN .  '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userUpdate($id)
{
    $users = showOne('khach_hang', $id);

    if (empty($users)) {
        e404();
    }
    $title = 'Danh sách khách hàng';
    $view = 'user/update';


    if (!empty($_POST)) {

        $data = [
            "ho_ten"   => $_POST['ho_ten'],
            "user"     => $_POST['user'],
            "email"    => $_POST['email'],
            "mat_khau" => $_POST['mat_khau'],
            "diachi"   => $_POST['diachi'],
            "dienthoai" => $_POST['dienthoai'],
            "vai_tro"  => $_POST['vai_tro'],
        ];

        $avatar = $_FILES['hinh'] ?? null;
        if (!empty($avatar)) {
            $data['hinh'] = upload_file($avatar, 'uploads/users');
        }

        if (!empty($avatar)
         && !empty($users['hinh'])                      //Có upload file
         && !empty($data['hinh'])                       // Upload file thành công
         && file_exists(PATH_UPLOAD . $users['hinh']))  // Phải còn file tồn tại trên hệ thống
         { 
            unlink(PATH_UPLOAD . $users['hinh']);
         }

        update('khach_hang', $id, $data);

        header('Location: ' . BASE_URL_ADMIN .  '?act=users-update&id=' . $id);

        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userDelete($id)
{
    delete2('khach_hang', $id);

    header('Location: ' . BASE_URL_ADMIN .  '?act=users');

    exit();
}
