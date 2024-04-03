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
match ($act) {
    '/' => dashboard(),
    'products' => listProducts(),
    'about' => about(),
    'product-detail' => productDetail(),
    'account' => account(),
    'account-deiltail' => accountdeiltail($_SESSION['user']['id']),
    'singout' => singout(),
};

require_once './commons/disconnect-db.php';