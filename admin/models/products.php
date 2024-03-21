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
if (!function_exists('loadAllsanpham')) {
    function loadAllsanpham() {
        try {
            $sql = "SELECT c.*,GROUP_CONCAT(DISTINCT CONCAT(a.mau, '-', b.size , '-' ,b.soluong) SEPARATOR ', ') AS mau_size_soluong
                    ,d.ten_loai
                    FROM mauhh a 
                    JOIN sizehh b ON a.id = b.mau_id 
                    JOIN sanpham c ON b.hh_id = c.id
                    JOIN loai d ON c.loai_id = d.id
                    GROUP BY c.id, c.ten_hh
                    ORDER BY c.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

