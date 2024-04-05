<?php

function cartList()
{
    $title = 'Danh sách đơn hàng';
    $view = 'cart/index';

    $carts = listAll('orders');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function cartShowOne($id)
{

    $carts = showOne('orders', $id);

    if (empty($cart)) {
        e404();
    }

    debug($cart);
    $title = 'Chi tiết loại hàng: ' . $cart['ten_loai'];
    $view = 'categories/show';

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

        $data = [
            "status_delivery"   => $_POST['trangthaidh'] ?? null,
            "status_payment"   => $_POST['trangthaitt'] ?? null,

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
