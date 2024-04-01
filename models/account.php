<?php
if (!function_exists('getUserAdminByUserAndPassword')) {
    function getUserAdminByUserAndPassword($user, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM khach_hang WHERE user = :user AND mat_khau = :mat_khau LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAccountToEmail')) {
    function loadAccountToEmail($email)
    {
        try {
            $sql = "SELECT user,mat_khau	FROM khach_hang WHERE email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
