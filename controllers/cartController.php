
<?php

function cartAdd($productID, $quantity = 0)
{
    // Kiểm tra xem là có product với cái ID kia không
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
        $_SESSION['cart'][$productID]['quantity'] = $quantity;

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

        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] += 1;
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

function alert(){
 
}

