<?php
function historyOder($kh_id, $idoder, $star, $end)
{
    try {
        $sql = "SELECT total_bill as tongtien, status_delivery as trangthaidh,status_payment as pttt,
        shipping as ptvc, ten_hh,don_gia,giam_gia,hinh,mau,size,quantity,b.mau_id,b.size_id,user_id,a.id as id_order,
        b.id as idorderitems
        FROM orders a join oder_items b on a.id = b.order_id join sanpham c on b.product_id = c.id
        join mauhh d on b.mau_id = d.id join sizehh e on b.size_id = e.id
        WHERE user_id = :user_id AND a.id = :id AND a.trangthai = 1 GROUP BY b.id,b.mau_id,b.size_id ORDER BY b.id DESC";
        if ($star != '' && $end != "") {
            $sql .= " LIMIT $star,$end";
        }

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":user_id", $kh_id);
        $stmt->bindParam(":id", $idoder);
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\PDOException $e) {
        debug($e);
    }
}

function listallhistoryOder($kh_id, $star, $end)
{
    try {
        $sql = "SELECT * FROM orders
        WHERE user_id = :user_id AND trangthai = 1 ORDER BY id DESC";
        if ($star != '' && $end != "") {
            $sql .= " LIMIT $star,$end";
        }

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":user_id", $kh_id);
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\PDOException $e) {
        debug($e);
    }
}
