<?php

// CRUD -> Create/Read(Danh sách/Chi tiết)/Update/Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        return implode(',', array_keys($data));
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('insert_get_last_id')) {
    function insert_get_last_id($tableName, $data = []) {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();

            return $GLOBALS['conn']->lastInsertId();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);

            $sql = "UPDATE $tableName SET $setParams WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete2($tableName, $id)
    {
        try {
            $sql = "UPDATE $tableName SET trangthai = 0 WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueName')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueName($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND name = :name LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameForUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND name = :name AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
// LoadAll sản phẩm LIMIT
if (!function_exists('lastloadLimit')) {
    function lastloadLimit($tableName, $start, $end)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 ORDER BY id DESC LIMIT $start,$end";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
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
                        $mau_size_soluong = ['idmau' => $color['id'], 'mau' => $color['mau'], 'size_soluong' => []];
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
// hiển thị tất cả biến thể của sản phẩm có hh_id 
if (!function_exists('showAllVariantProduct')) {
    function showAllVariantProduct($tableName, $hh_id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND hh_id = :hh_id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmail')) {
    // nếu không trùng thì trả về true
    // nếu trung trả về false
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailUpdate')) {
    // nếu không trùng thì trả về true
    // nếu trung trả về false
    function checkUniqueEmailUpdate($tableName, $id,  $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE trangthai = 1 AND email = :email AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getUserAdminByEmailAndPassword')) {
    function getUserAdminByEmailAndPassword($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM khach_hang WHERE trangthai = 1 AND email = :email AND mat_khau = :mat_khau AND vai_tro = 1 LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":mat_khau", $mat_khau);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
