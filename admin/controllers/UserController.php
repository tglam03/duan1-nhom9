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
            "hinh"     => $_POST['hinh'],
        ];


        insert('khach_hang', $data);

        header('Location: ' . BASE_URL_ADMIN .  '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userUpdate($id)
{
    $title = 'Danh sách khách hàng';
    $view = 'user/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userDelete($id)
{
}
