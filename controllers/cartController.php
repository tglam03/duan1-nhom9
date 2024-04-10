
<?php

function cartAdd($productID, $quantity = 0)
{
    // Kiểm tra xem là có product với cái ID kia không
    if (!empty($_POST)) {
        $mau = (isset($_POST['mau']) && $_POST['mau'] != "") ? $_POST['mau'] : '';
        $size = (isset($_POST['size']) && $_POST['size'] != "") ? $_POST['size'] : '';
        $quantity = (isset($_POST['soluong']) && $_POST['soluong'] != "") ? $_POST['soluong'] : 1;
        if ($size != "") {
            $soluong = explode(',', $size)[1];
            $sizesp = explode(',', $size)[0];
            if ($quantity > $soluong) {
                $_SESSION['erorssoluong'] = "Chỉ còn $soluong sản phẩm size đó";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $sizesp = showOne('sizehh', $sizesp);
        }
        if ($mau != '') {
            $mau = showOne('mauhh', $mau);
        }
    } else {
        $mau = loadLimitVariant('mauhh', $productID, 'hh_id');
        $sizesp = loadLimitVariant('sizehh', $mau['id'], 'mau_id');
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
        $_SESSION['cart'][$productID]['mausize']['idsize'] = $sizesp['id'];
        $_SESSION['cart'][$productID]['mausize']['idmau'] = $mau['id'];
        insert('cart_items', [
            'cart_id' => $cartID,
            'product_id' => $productID,
            'quantity' => $quantity,
            'mau_id' => $mau['id'],
            'size_id' => $sizesp['id'],
        ]);
    } else {
        $qtyTMP = $_SESSION['cart'][$productID]['mausize']['quantity'] += $quantity;
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
    $script = 'cart';
    $vocher = listAll('magiamgia');
    if (isset($_GET['giam']) && $_GET['giam'] != "") {
        unset($_SESSION['magg']);
        if (isset($_GET['magiamgia']) && $_GET['magiamgia'] != "") {
            if (isset($_GET['magiamgia']) && $_GET['magiamgia'] != "") {
                $_SESSION['magg']['tenmagg'] = $_GET['magiamgia'];
            }
            $_SESSION['magg']['giam'] = $_GET['giam'];
        }
        header('Location:' . BASE_URL . '?act=cart-list');
        exit();
    }
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
        if(isset($_SESSION['cart'][$productID]['mausize']['idsize']) && $_SESSION['cart'][$productID]['mausize']['idsize']!=""){
            $soluong = showOne('sizehh',$_SESSION['cart'][$productID]['mausize']['idsize']);
            if($_SESSION['cart'][$productID]['mausize']['quantity']<=$soluong['soluong']){
                $qtyTMP = $_SESSION['cart'][$productID]['mausize']['quantity'] += 1;
                updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
            }
        }
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
    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['mausize']['quantity'] >  1) {

        $qtyTMP = $_SESSION['cart'][$productID]['mausize']['quantity'] -= 1;
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

function alert()
{
}
