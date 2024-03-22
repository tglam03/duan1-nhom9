<?php

session_start();

// Require file trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);





// Điều hướng
$act = $_GET['act'] ?? '/';



$cate = isset($_GET['id']) ? $_GET['id'] : null;
// rằng khóa 'id' luôn được đặt trước khi truy cập vào nó, từ đó ngăn ngừa lỗi "Undefined array key 'id'".


// Kiểm tra user đã đăng nhập chưa
middleware_auth_check($act);

match ($act) {
    '/' => dashboard(),
    //login
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),

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



    //CRUD Mã giảm giá
    // 'magiamgia'        => magiamgiaListAll(),
    // 'magiamgia-detail' => magiamgiaShowOne($_GET['id']),
    // 'magiamgia-create' => magiamgiaCreate(),
    // 'magiamgia-update' => magiamgiaUpdate($_GET['id']),
    // 'magiamgia-delete' => magiamgiaDelete($_GET['id']),
};

require_once '../commons/disconnect-db.php';
