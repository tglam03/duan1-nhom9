<?php
// hàm check login
if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['user'])) {
            header('Location: ' . BASE_URL_ADMIN . '?act=login');
        }
    }
}

