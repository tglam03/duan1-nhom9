<?php

session_start();

// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);



// Điều hướng
$act = $_GET['act'] ?? '/';


// khai báo được link cần đăng nhập thì mới được vào
$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-icn',
    'cart-dec',
    'cart-delete'
];


// kiểm tra xem user đã đăng nhập chưa
middleware_auth_check($act, $arrRouteNeedAuth);


match ($act) {
    '/' => dashboard(),
    'products' => listProducts(),
    'about' => about(),
    'product-detail' => productDetail(),
    'account' => account(),
    'account-deiltail' => accountdeiltail($_SESSION['user']['id']),
    'singout' => singout(),
    // giỏ hàng
    'cart-add'    => cartAdd($_GET['productID'], $_GET['quantity']),
    'cart-list'   => cartList(),
    'cart-inc'    => cartInc($_GET['productID']),  // tăng số lượng
    'cart-dec'    => cartDec($_GET['productID']),   // giảm số lượng
    'cart-delete' => cartDelete($_GET['productID']),

    // oder
    'oder-checkout' => orderCheckOut(), //  xử lí mua hàng
    'oder-purchase' => oderPurchase(), //   đặt hàng
    'comfirm' => comfirm(),
    'orderhistory' => orderHistory(),
    'orderCancel' => orderCancel(),
};

require_once './commons/disconnect-db.php';
