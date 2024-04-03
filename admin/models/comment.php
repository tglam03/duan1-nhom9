<?php
if (!function_exists('loadall_comment')) {
    function loadall_comment($hh_id)
    {
        try {
            $sql = "SELECT *,b.id as idbl,c.id as idhh from khach_hang a join binh_luan b on a.id = b.kh_id 
            join sanpham c on b.hh_id = c.id where b.hh_id = :hh_id AND b.trangthai = 1 ORDER BY b.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
