<?php
if (!function_exists('loadAllspcungloai')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function loadAllspcungloai($tableName, $loai_id,$id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE  loai_id = :loai_id AND id <> :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":loai_id", $loai_id);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}