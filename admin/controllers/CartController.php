<?php

function cartList()
{
    $title = 'Danh sách đơn hàng';
    $view = 'cart/index';
    $script = 'datatable';
    $style = 'datatable';
    $carts = listAll('orders');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function cartShowOne($id)
{
    $carts = loadAllofdayProductid($id);
    if (empty($carts)) {
        e404();
    }

    $title = 'Chi tiết đơn hàng: OD-' . $id;
    $view = 'cart/show';
    $script = 'datatable';
    $style = 'datatable';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function cartUpdate($id)
{
    $carts = showOne('orders', $id);

    if (empty($carts)) {
        e404();
    }
    $title = 'Cập nhật đơn hàng';
    $view = 'cart/update';
    if (!empty($_POST)) {
        if ($_POST['trangthaidh'] == 3) {
            $thanhtoan = 1;
        } else {
            $thanhtoan = 0;
        }
        $data = [
            "status_delivery"   => $_POST['trangthaidh'] ?? null,
            "thanhtoan"   => $thanhtoan,

        ];


        // validation
        // $erors = validateCategoryUpdate($data);
        if (empty($erors)) {

            update('orders', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công';

            header('Location: ' . BASE_URL_ADMIN .  '?act=cart-update&id=' . $id);

            exit();
        }
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
