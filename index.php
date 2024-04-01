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


// khai báo được link cần đăng nhập thì mới được vào
$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-icn',
    'cart-dec',
    'cart-delete'
];


// kiểm tra xem user đã đăng nhập chưa
 //middleware_auth_check($act , $arrRouteNeedAuth);
// Điều hướng
$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => dashboard(),
    'products' => listProducts(),
    'about' => about(),
    'product-detail' => productDetail(),

    // giỏ hàng
    'cart-add'    => cartAdd($_GET['product_id'], $_GET['quantity'] ),
    'cart-list'   => cartList(),
    'cart-icn'    => cartInc($_GET['product_id']),  // tăng số lượng
    'cart-dec'    => cartDec($_GET['product_id']),   // giảm số lượng
    'cart-delete' => cartDelete($_GET['product_id']),

    'checkout'    => checkout()

};

require_once './commons/disconnect-db.php';
