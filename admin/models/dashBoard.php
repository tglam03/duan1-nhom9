<?php
if (!function_exists('loadAllofOneDay')) {
    function loadAllofOneDay($day, $dk)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = new DateTime();
        $subtractedDate = clone $currentDate;
        $subtractedDate->modify('-' . $day . ' days');
        $ngaykthuc = $subtractedDate->format('Y/m/d H:i:s');
        $ngaybd = date('Y/m/d H:i:s');
        try {
            $sql = "SELECT SUM(b.quantity) AS total_quantity,total_bill FROM orders a join oder_items b on a.id = b.order_id WHERE a.trangthai = 1 ";
            $sql .= " AND updated_at <= :ngaybd AND updated_at >= :ngaykthuc AND $dk GROUP BY b.id ORDER BY a.id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các giá trị với câu lệnh SQL
            $stmt->bindParam(':ngaykthuc', $ngaykthuc);
            $stmt->bindParam(':ngaybd', $ngaybd);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAllofdayProduct')) {
    function loadAllofdayProduct($day, $dk,$dkorderby)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = new DateTime();
        $subtractedDate = clone $currentDate;
        $subtractedDate->modify('-' . $day . ' days');
        $ngaykthuc = $subtractedDate->format('Y/m/d H:i:s');
        $ngaybd = date('Y/m/d H:i:s');
        try {
            $sql = "SELECT hinh,ten_hh,b.product_id, SUM(b.quantity) AS total_quantity, SUM(b.price*b.quantity) AS tienthu FROM orders a join oder_items b on a.id = b.order_id join sanpham c on b.product_id = c.id WHERE a.trangthai = 1 ";
            $sql .= " AND updated_at <= :ngaybd AND updated_at >= :ngaykthuc AND $dk GROUP BY b.product_id ORDER BY $dkorderby DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các giá trị với câu lệnh SQL
            $stmt->bindParam(':ngaykthuc', $ngaykthuc);
            $stmt->bindParam(':ngaybd', $ngaybd);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}