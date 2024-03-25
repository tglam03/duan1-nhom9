<?php
if (!function_exists('lastload8sp')) {
    function lastload8sp($tableName,$start,$end) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC LIMIT $start,$end";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}