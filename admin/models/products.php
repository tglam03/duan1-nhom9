<?php
if (!function_exists('lastID')) {
    function lastID($tableName)
    {
        try {
            $sql = "SELECT id FROM $tableName WHERE trangthai = 1 ORDER BY id DESC LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetch();

            return $result['id'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('deleteProduct')) {
    function deleteProduct($tableName, $hh_id)
    {
        try {
            $sql = "UPDATE $tableName SET trangthai = 0 where hh_id = :hh_id";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('deleteSize')) {
    function deleteSize($tableName, $mau_id)
    {
        try {
            $sql = "UPDATE $tableName SET trangthai = 0 where mau_id = :mau_id";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":mau_id", $mau_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//kiểm tra sản phẩm có size gì và số lượng là bao nhiêu
// if (!function_exists('checkmausize')) {
//     function checkmausize($productsColorsandsize)
//     {
//         try {
//             $mangsize = [];
//             $mangsoluong = [];
//             $mangid = [];
//             $checksize = [];
//             foreach ($productsColorsandsize['mau'] as $key => $mau) {
//                 foreach ($productsColorsandsize['size'] as $size) {
//                     if ($mau['id'] == $size['mau_id']) {
//                         if ($size['size'] == 'S') {
//                             $cheksize[$key]['s']['size'] = 1;
//                             $cheksize[$key]['s']['soluong']= $size['soluong'];
//                             $cheksize[$key]['s']['id'] =$size['id'];
//                         }
//                         if ($size['size'] == 'M') {
//                             $cheksize[$key]['m']['size'] = 1;
//                             $cheksize[$key]['m']['soluong']= $size['soluong'];
//                             $cheksize[$key]['m']['id'] =$size['id'];
//                         }
//                         if ($size['size'] == 'L') {
//                             $cheksize[$key]['l']['size'] = 1;
//                             $cheksize[$key]['l']['soluong']= $size['soluong'];
//                             $cheksize[$key]['l']['id'] =$size['id'];
//                         }
//                         if ($size['size'] == 'XL') {
//                             $cheksize[$key]['xl']['size'] = 1;
//                             $cheksize[$key]['xl']['soluong']= $size['soluong'];
//                             $cheksize[$key]['xl']['id'] =$size['id'];
//                         }
//                         if ($size['size'] == 'XXL') {
//                             $cheksize[$key]['xxl']['size'] = 1;
//                             $cheksize[$key]['xxl']['soluong']= $size['soluong'];
//                             $cheksize[$key]['xxl']['id'] =$size['id'];
//                         }
//                     }
//                 }
//             }
//             return $cheksize;
//         } catch (\Exception $e) {
//             debug($e);
//         }
//     }
// }
