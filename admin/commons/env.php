<?php

// khai báo các biến môi trường, dùng Global

define('PATH_CONTROLLER', __DIR__ . '/../controllers');  // lấy ra đường dẫn đến controller

define('PATH_MODEL', __DIR__ . '/../models');  // lấy ra đường dẫn đến models

define('PATH_VIEW', __DIR__ . '/../views');  // lấy ra đường dẫn đến view

define('BASE_URL','http://duan1_nhom9.test/admin/');


// connect SQL
define('DB_HOST','locahost');
define('DB_PORT','3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','mvc_base');  // thay doi ten db o day