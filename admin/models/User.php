<?php 

if (!function_exists('checkUniqueEmail')) {
    // nếu không trùng thì trả về true
    // nếu trung trả về false
    function checkUniqueEmail($tableName, $email) {
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
    function checkUniqueEmailUpdate($tableName, $id,  $email) {
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