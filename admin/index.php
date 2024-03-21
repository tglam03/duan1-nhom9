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


// Kiểm tra user đã đăng nhập chưa
middleware_auth_check($act);

match ($act) {
    '/' => dashboard(),

    //login
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),


    //CRUD User
    'users'        => userListAll(),
    'users-detail' => userShowOne($_GET['id']),
    'users-create' => userCreate(),
    'users-update' => userUpdate($_GET['id']),
    'users-delete' => userDelete($_GET['id']),


    // //CRUD Loai
    // 'loai'        => loaiListAll(),
    // 'loai-detail' => loaiShowOne($_GET['id']),
    // 'loai-create' => loaiCreate(),
    // 'loai-update' => loaiUpdate($_GET['id']),
    // 'loai-delete' => loaiDelete($_GET['id']),



    //CRUD Mã giảm giá
    // 'magiamgia'        => magiamgiaListAll(),
    // 'magiamgia-detail' => magiamgiaShowOne($_GET['id']),
    // 'magiamgia-create' => magiamgiaCreate(),
    // 'magiamgia-update' => magiamgiaUpdate($_GET['id']),
    // 'magiamgia-delete' => magiamgiaDelete($_GET['id']),
};

require_once '../commons/disconnect-db.php';
