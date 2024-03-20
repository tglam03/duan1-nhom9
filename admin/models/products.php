<?php
if (!function_exists('lastID')) {
    function lastID($tableName) {
        try {
            $sql = "SELECT id FROM $tableName ORDER BY id DESC LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetch();

            return $result['id'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}