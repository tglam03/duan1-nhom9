<?php

if (!function_exists('checkUniqueEmail')) {
    // nếu không trùng thì trả về true
    // nếu trung trả về false
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailUpdate')) {
    // nếu không trùng thì trả về true
    // nếu trung trả về false
    function checkUniqueEmailUpdate($tableName, $id,  $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


// hàm check login
// if (!function_exists('middleware_auth_check')) {
//     function middleware_auth_check($act)
//     {
//         if ($act == 'login') {
//             if (!empty($_SESSION['user'])) {
//                 header('Location: ' . BASE_URL_ADMIN);
//                 exit();
//             }
//         } elseif (empty($_SESSION['user'])) {
//             header('Location: ' . BASE_URL_ADMIN . '?act=login');
//         }
//     }
// }


if (!function_exists('getUserAdminByEmailAndPassword')) {
    function getUserAdminByEmailAndPassword($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM khach_hang WHERE email = :email AND mat_khau = :mat_khau AND vai_tro = 1 LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
