<?php
if (!function_exists('locProduct')) {
    function locProduct($selectedValue,$tableName,$start,$end) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY ";
            switch ($selectedValue) {
                case 'popularity':
                    $sql .= "so_luot_xem DESC";
                    break;
                case 'new':
                    $sql .= "id DESC";
                    break;
                case 'price':
                    $sql .= "don_gia ASC";
                    break;
                case 'price-desc':
                    $sql .= "don_gia DESC";
                    break;
                default:
                    break;
            }
            $sql .= " LIMIT $start,$end";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}