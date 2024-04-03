<?php

session_start();
require_once '../commons/helper.php';
if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1) {
// Require file trong commons
require_once '../commons/env.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);





// Điều hướng
$act = $_GET['act'] ?? '/';



$cate = isset($_GET['id']) ? $_GET['id'] : null;
// rằng khóa 'id' luôn được đặt trước khi truy cập vào nó, từ đó ngăn ngừa lỗi "Undefined array key 'id'".

match ($act) {
    '/' => dashboard(),

    // CRUD product
    'product' => productListAll(),
    'product-create' => productCreate(),
    'product-update' => productUpdate($_GET['id']),
    'product-delete' => productDelete($_GET['id']),

    //CRUD User
    'users'        => userListAll(),
    'users-detail' => userShowOne($_GET['id']),
    'users-create' => userCreate(),
    'users-update' => userUpdate($_GET['id']),
    'users-delete' => userDelete($_GET['id']),

    
    //CRUD Category
    'category'        => categoryListAll(),
    'category-detail' => categoryShowOne($cate),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($cate),
    'category-delete' => categoryDelete($cate),

    //CRUD Comment
    'comment'        => comment(),
    'comment-detail' => commentShowOne($_GET['id']),
    'delete-comment' => commentDelete($_GET['id'],$_GET['idhh']),

    //CRUD Mã giảm giá
    // 'voucher'        => voucherListAll(),
    // 'voucher-detail' => voucherShowOne($_GET['id']),
    // 'voucher-create' => voucherCreate(),
    // 'voucher-update' => voucherUpdate($_GET['id']),
    // 'voucher-delete' => voucherDelete($_GET['id']),
};
require_once '../commons/disconnect-db.php';
}else{
    header('Location:http://localhost/duan1_nhom9/');
    // echo "404 - Not found";
    // die;
}
