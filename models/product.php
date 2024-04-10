<?php
if (!function_exists('locProduct')) {
    function locProduct($selectedValue, $tableName, $start, $end)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 ORDER BY ";
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

if (!function_exists('locselect')) {
    function locselect($selectedValue, $tableName, $start, $end, $soluotxem, $dongia, $loaisp)
    {
        $check1 = 0;
        $dongia1=[];
        $soluotxem1=[];
        $ok = 0;
        $check2 = 0;
        $ok1 = 0;
        $check3 = 0;
        if ($dongia != '') {
            if (!isset(explode('-', $dongia)[1])) {
                $dongia1 = $dongia;
                $ok = 1;
            } else {
                $dongia1 = explode('-', $dongia);
            }
            $check1 = 1;
        }
        if ($soluotxem != '') {
            if (!isset(explode('-', $soluotxem)[1])) {
                $soluotxem1 = $soluotxem;
                $ok1 = 1;
            } else {
                $soluotxem1 = explode('-', $soluotxem);
            }
            $check2 = 1;
        }
        if ($loaisp != '') {
            $check3 = 1;
        }
        if ($check1 == 1) {
            $selectedValue = 'dongia';
        } elseif ($check2 == 1) {
            $selectedValue = 'luotxem';
        } elseif ($check3 == 1) {
            $selectedValue = 'loai';
        } elseif ($check1 == 1 && $check2 == 1) {
            $selectedValue = 'dongialuotxem';
        } elseif ($check1 == 1 && $check3 == 1) {
            $selectedValue = 'dongialoai';
        } elseif ($check1 == 1 && $check2 == 1 && $check3 == 1) {
            $selectedValue = 'dongialuotxemloai';
        } elseif ($check2 == 1 && $check3 == 1) {
            $selectedValue = 'luotxemloai';
        }
        try {
            $sql = "SELECT * FROM $tableName Where trangthai = 1 ";
            switch ($selectedValue) {
                case 'dongia':
                    if ($ok == 1) {
                        $sql .= " AND don_gia $dongia1";
                    } else {
                        $sql .= " AND don_gia > $dongia1[0] AND don_gia < $dongia1[1]";
                    }
                    break;
                case 'luotxem':
                    if ($ok1 == 1) {
                        $sql .= " AND so_luot_xem $soluotxem1";
                    } else {
                        $sql .= " AND so_luot_xem > $soluotxem1[0] AND so_luot_xem < $soluotxem1[1]";
                    }
                    break;
                case 'loai':
                    $sql .= " AND loai_id $loaisp";
                    break;
                case 'dongialuotxem':
                    if ($ok == 1 && $ok1 ==1) {
                        $sql .= " AND don_gia $dongia1 AND so_luot_xem $soluotxem1";
                    } elseif($ok==1 && $ok1=0){
                        $sql .= " AND don_gia $dongia1 AND so_luot_xem > $soluotxem1[0] AND so_luot_xem < $soluotxem1[1]";
                    }else{
                        $sql .= " AND don_gia > $dongia1[0] AND don_gia < $dongia1[1] AND so_luot_xem $soluotxem1";
                    }
                    break;
                case 'dongialoai':
                    if ($ok = 1) {
                        $sql .= " AND don_gia $dongia1 AND loai_id $loaisp";
                    } else {
                        $sql .= " AND don_gia > $dongia1[0] AND don_gia < $dongia1[1] AND loai_id $loaisp";
                    }
                    break;
                case 'dongialuotxemloai':
                    if ($ok == 1 && $ok1 ==1) {
                        $sql .= " AND don_gia $dongia1 AND so_luot_xem $soluotxem1 AND loai_id $loaisp";
                    } elseif($ok==1 && $ok1=0){
                        $sql .= " AND don_gia $dongia1 AND so_luot_xem > $soluotxem1[0] AND so_luot_xem < $soluotxem1[1] AND loai_id $loaisp";
                    }else{
                        $sql .= " AND don_gia > $dongia1[0] AND don_gia < $dongia1[1] AND so_luot_xem $soluotxem1 AND loai_id $loaisp";
                    }
                    break;
                case 'luotxemloai':
                    if ($ok1 = 1) {
                        $sql .= " AND don_gia $dongia1 AND loai_id $loaisp";
                    } else {
                        $sql .= " AND don_gia BETWEEN $dongia1[0] AND $dongia1[1] AND loai_id $loaisp";
                    }
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

//locsp theo tên 
if (!function_exists('loctenProduct')) {
    function loctenProduct($kyw,$start, $end)
    {
        try {
            // Sử dụng tham số hóa để bảo vệ truy vấn khỏi SQL Injection
            $sql = "SELECT * FROM sanpham WHERE ten_hh like :kyw ORDER BY id DESC LIMIT $start, $end";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $kyw = "%" . $kyw . "%";
            $stmt->bindParam(':kyw', $kyw, PDO::PARAM_STR);
            $stmt->execute();

            // Xử lý kết quả và trả về
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Xử lý lỗi một cách thích hợp, ví dụ: ghi log và trả về một giá trị mặc định
            error_log("Error in loctenProduct: " . $e->getMessage());
            return [];
        }
    }
}


