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

match($act) {
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


};

require_once '../commons/disconnect-db.php';