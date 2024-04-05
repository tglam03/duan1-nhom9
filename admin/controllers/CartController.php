<?php 

function cartList(){
    $title = 'Danh sách đơn hàng';
    $view = 'cart/index';

    $carts = listAll('orders');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function cartShowOne($id){
    
    $cart = showOne('orders', $id);

    if (empty($cart)) {
        e404();
    }

    debug(historyOder($id));
    $title = 'Chi tiết loại hàng: ' . $cart['ten_loai'];
    $view = 'categories/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}