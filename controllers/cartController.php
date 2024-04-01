
<?php

function cartAdd($ProductId, $quantity = 0){
    // kiểm tra xem có product với id không ?
        $product = showOne('sanpham', $ProductId);

        if(empty($product)){
            debug('404 Not');
        }
    // kiểm tra xem trong bảng cart đã có bản ghi nào của user đang đặp nhật chưa chưa?

    // có rồi thì lấy ra , nếu chưa tạo mới
        $cartID = getCartID($_SESSION['user']['id']);
    // add sản phẩm vào session cart

    // sau đó add tiếp sản phẩm vào cart items

    // chuyển hướng qua trang list

    
}
function cartList(){
    $title = 'Giỏ hàng';
    $view = 'cart/cart';
    $style = 'cart';

    require_once PATH_VIEW . 'layouts/client.php';

}
function cartInc($ProductId){

}
function cartDec($ProductId){

}
function cartDelete($ProductId){

}