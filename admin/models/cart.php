<?php
function historyOder($kh_id) {
    try {
        $sql = "SELECT user_id,user_name,user_phone,user_address,total_bill as tongtien, status_delivery as trangthaidh,status_payment as pttt,
        shipping as ptvc, ten_hh,don_gia,giam_gia,hinh,mau,size,quantity,b.mau_id,b.size_id,user_id,a.id as id_order,
        b.id as idorderitems
        FROM orders a join oder_items b on a.id = b.order_id join sanpham c on b.product_id = c.id
        join mauhh d on b.mau_id = d.id join sizehh e on b.size_id = e.id
        WHERE user_id = :user_id GROUP BY b.id,b.mau_id,b.size_id ORDER BY b.id ASC ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":user_id", $kh_id);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\PDOException $e) {
        debug($e);
    }
}

if (!function_exists('loadAllofdayProductid')) {
    function loadAllofdayProductid($id)
    {
        try {
            $sql = "SELECT a.id as idorder,hinh,ten_hh,b.product_id, SUM(b.quantity) AS total_quantity, SUM(b.price*b.quantity) AS tienthu FROM orders a join oder_items b on a.id = b.order_id join sanpham c on b.product_id = c.id WHERE a.trangthai = 1 ";
            $sql .= " AND a.id = :id GROUP BY b.product_id ORDER BY b.product_id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}