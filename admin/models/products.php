<?php
if (!function_exists('lastID')) {
    function lastID($tableName)
    {
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
if (!function_exists('showAllVariantProduct')) {
    function showAllVariantProduct($tableName, $hh_id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE hh_id = :hh_id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('deleteProduct')) {
    function deleteProduct($tableName, $hh_id)
    {
        try {
            $sql = "DELETE FROM $tableName where hh_id = :hh_id";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//chuyển size số lượng thành mảng 
if (!function_exists('movearray')) {
    function movearray($products, $productsColors, $productsSizes)
    {
        try {
            if (!is_array($products) || empty($products) || !is_array($productsColors) || empty($productsColors) || !is_array($productsSizes) || empty($productsSizes)) {
                throw new Exception("Không có dữ liệu.");
            }

            foreach ($products as &$product) {
                if (!isset($product['id'])) {
                    throw new Exception("Không tồn tại ID sản phẩm.");
                }

                $mau_size_soluongs = [];
                foreach ($productsColors as $color) {
                    if ($product['id'] == $color['hh_id']) {
                        $mau_size_soluong = ['mau' => $color['mau'], 'size_soluong' => []];
                        foreach ($productsSizes as $size) {
                            if ($product['id'] == $size['hh_id'] && $color['id'] == $size['mau_id']) {
                                $mau_size_soluong['size_soluong'][] = $size['size'];
                                $mau_size_soluong['size_soluong'][] = $size['soluong'];
                            }
                        }
                        $mau_size_soluongs[] = $mau_size_soluong;
                    }
                }
                $product['mau_size_soluong'] = $mau_size_soluongs;
            }
            return $products;
        } catch (Exception $e) {
            debug($e->getMessage());
        }
    }
}
//chuyển đổi size chuỗi số lượng thành tổng màu thành chuỗi
if (!function_exists('productConvert')) {
    function productConvert($products)
    {
        try {
            foreach ($products as &$product) {
                if (isset($product['mau_size_soluong']) && is_array($product['mau_size_soluong'])) {
                    $maus = [];
                    $sizes = [];
                    $tongsoluongs = [];
                    $mau_size_soluongs = $product['mau_size_soluong'];
                    foreach ($mau_size_soluongs as $mau_size_soluong) {
                        $mau = $mau_size_soluong['mau'];
                        $sizes_soluong = $mau_size_soluong['size_soluong'];
                        foreach ($sizes_soluong as $key => $size_soluong) {
                            if ($key % 2 == 0) {
                                $sizes[] = $size_soluong;
                            } else {
                                $tongsoluongs[] = $size_soluong;
                            }
                        }
                        $maus[] = $mau;
                    }
                    $tongsoluongsp = array_sum($tongsoluongs);
                    $size = implode(',', array_unique($sizes));
                    $mau = implode(',', array_unique($maus));
                    $tongmausizesoluong = array('mau' => $mau, 'size' => $size, 'soluong' => $tongsoluongsp);
                    $product['mau_size_soluong'] = $tongmausizesoluong;
                }
            }
            return $products;
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
