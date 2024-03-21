<?php

function authenShowFormLogin()
{
    if ($_POST) {
        authenLogin();
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}


function authenLogin()
{
    $user = getUserAdminByEmailAndPassword($_POST['email'], $_POST['mat_khau']);


    // check lỗi nếu không đúng sẽ quay về trnag login
    if (empty($user)) {
        $_SESSION['error'] = 'Email hoặc mật khẩu không đúng';

        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;
    // nếu đúng sẽ chạy sang trang admin
    header('Location: ' . BASE_URL_ADMIN);
    exit();
}

function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }
    header('Location: ' . BASE_URL);
    exit();
}
