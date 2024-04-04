
<?php

function cartAdd($productID, $quantity = 0)
{
    // Kiểm tra xem là có product với cái ID kia không
    $mau = (isset($_POST['mau'])&&$_POST['mau']!="")?$_POST['mau']:'';
    $size = (isset($_POST['size'])&&$_POST['size']!="")?$_POST['size']:'';
    $quantity = (isset($_POST['soluong'])&&$_POST['soluong']!="")?$_POST['soluong']:1;
    if($size!=""){
        $soluong = explode(',',$size)[1];
        $sizesp = explode(',',$size)[0];
        if($quantity>$soluong){
            $_SESSION['erorssoluong'] = "Chỉ còn $soluong sản phẩm size đó";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        $sizesp = showOne('sizehh',$sizesp);
    }
    if($mau!=''){
        $mau = showOne('mauhh',$mau);
    }
    $product = showOne('sanpham', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    // Kiểm tra xem trong bảng carts thì đã có bản ghi nào của user đang đăng nhập chưa
    // Có rồi thì lấy ra cartID, nếu chưa thì tạo mới
    $cartID = getCartID($_SESSION['user']['id']);

    $_SESSION['cartID'] = $cartID;

    // Add sản phẩm vào session cart: $_SESSION['cart'][$productID] = $product
    // Add tiếp sản phẩm vào thằng cart_items
    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = $product;
        $_SESSION['cart'][$productID]['mausize']['quantity'] = $quantity;
        $_SESSION['cart'][$productID]['mausize']['size'] = $sizesp['size'];
        $_SESSION['cart'][$productID]['mausize']['mau'] = $mau['mau'];
        insert('cart_items', [
            'cart_id' => $cartID,
            'product_id' => $productID,
            'quantity' => $quantity
        ]);
    } else {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] += $quantity;

        updateQuantityByCartIDAndProductID($cartID, $productID, $qtyTMP);
    }

    // Chuyển hướng qua trang list cart
    header('Location: ' . BASE_URL . '?act=cart-list');
}
function cartList()
{
    $title = 'Giỏ hàng';
    $view = 'cart/cart';
    $style = 'cart';
    //  debug($_SESSION['cart']);
    require_once PATH_VIEW . 'layouts/client.php';
}
function cartInc($productID)
{
    // Kiểm tra xem là có product với cái ID kia không
    $product = showOne('sanpham', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    if (isset($_SESSION['cart'][$productID])) {

        $qtyTMP = $_SESSION['cart'][$productID]['mausize']['quantity'] += 1;
        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }
    header('Location: ' . BASE_URL . '?act=cart-list');
}


function cartDec($productID)
{
    // Kiểm tra xem là có product với cái ID kia không
    $product = showOne('sanpham', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }
    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['quantity'] >  1) {

        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] -= 1;
        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }
    header('Location: ' . BASE_URL . '?act=cart-list');
}


function cartDelete($productID)
{
    // Kiểm tra xem là có product với cái ID kia không
    $product = showOne('sanpham', $productID);
    if (empty($product)) {
        debug('404 Not found');
    }

    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);

        deleteCartIteamsAndProductID($_SESSION['cartID'], $productID);
    }

    header('Location: ' . BASE_URL . '?act=cart-list');
}
