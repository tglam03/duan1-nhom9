<?php
if (!function_exists('loadAllspcungloai')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function loadAllspcungloai($tableName, $loai_id, $id)
    {
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

if (!function_exists('loadAllBinhluan')) {
    function loadAllBinhluan($hh_id)
    {
        try {
            $sql = "SELECT * from khach_hang a join binh_luan b on a.id = b.kh_id 
            join sanpham c on b.hh_id = c.id where b.hh_id = :hh_id ORDER BY b.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
