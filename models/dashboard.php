<?php
if (!function_exists('lastload8sp')) {
    function lastload8sp($tableName) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC LIMIT 0,8";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}