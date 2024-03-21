<?php
function productListAll()
{
    $title = 'Danh Sách Sản Phẩm';
    $view = 'products/index';
    $script = 'datatable';
    $style = 'datatable';
    $products = loadAllsanpham();
    debug($products);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreate()
{
    $title = 'Thêm Mới Sản Phẩm';
    $view = 'products/add';
    $script1 = 'scripts';
    $category = listAll('loai');
    if (!empty($_POST)) {
        //validate
        $product_img = $_FILES['hinh'] ?? null;
        $countimg = count($product_img['name']);
        // //xử lý hình ảnh
        if (!empty($product_img)) {
            for ($i = 0; $i < $countimg; $i++) {
                $product_imgs[$i]['name'] = $product_img['name'][$i];
                $product_imgs[$i]['tmp_name'] = $product_img['tmp_name'][$i];
                $data['hinh'] = upload_file($product_imgs[$i], 'uploads/');
                $hinh[] = $data['hinh'];
            }
        }
        $data = [
            'ten_hh' => $_POST['ten_hh'] ?? null,
            'don_gia' => $_POST['don_gia'] ?? null,
            'giam_gia' => $_POST['giam_gia'] ?? 0,
            'loai_id' => $_POST['loai_id'] ?? null,
            'ngay_nhap' => date('h:i:s d/m/Y'),
            'mo_ta' => $_POST['mo_ta'] ?? null,
            'hinh' => implode(',', $hinh) ?? null,
        ];
        $variant = $_POST['variant'];
        $soluong = count($variant);
        for ($i = 1; $i <= $soluong; $i++) {
            $data1[$i][] = [
                'mau' => $variant[$i]['mau'],
            ];
            foreach ($variant[$i]['size'] as $value) {
                if (!empty($value[1]) && !empty($value[0])) {
                    $data1[$i][] = [
                        'size' => $value[0],
                        'soluong' => $value[1],
                    ];
                }
            }
        }
        // debug($data1);
        $errors = validateProduct($data,$data1,$product_img);
        if(!empty($errors)){
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            exit();
        }
        //end validate

        insert('sanpham', $data);
//         //xử lý biến thể
        $lastID = lastID('sanpham');
        for ($i = 1; $i <= $soluong; $i++) {
            $data = [
                'hh_id' => $lastID,
                'mau' => $variant[$i]['mau'],
            ];
            insert('mauhh', $data);
            $lastIDmau = lastID('mauhh');
            foreach ($variant[$i]['size'] as $value) {
                if (!empty($value[1]) && !empty($value[0])) {
                    $data = [
                        'hh_id' => $lastID,
                        'mau_id' => $lastIDmau,
                        'size' => $value[0],
                        'soluong' => $value[1],
                    ];
                    insert('sizehh', $data);
                }
            }
        }
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productUpdate($id)
{
    $title = 'Cập Nhật Sản Phẩm';
    $view = 'products/update';
    $script1 = 'scripts';
    $category = listAll('loai');
    if (!empty($_POST)) {
        //validate
        $data = [
            'ten_hh' => $_POST['ten_hh'] ?? null,
            'don_gia' => $_POST['don_gia'] ?? null,
            'giam_gia' => $_POST['giam_gia'] ?? 0,
            'loai_id' => $_POST['loai_id'] ?? null,
            'ngay_nhap' => date('h:i:s d/m/Y'),
            'mo_ta' => $_POST['mo_ta'] ?? null,
        ];
        $product_img = $_FILES['hinh'] ?? null;
        $countimg = count($product_img['name']);
        $variant = $_POST['variant'];
        $soluong = count($variant);
        for ($i = 1; $i <= $soluong; $i++) {
            $data1[$i][] = [
                'mau' => $variant[$i]['mau'],
            ];
            foreach ($variant[$i]['size'] as $value) {
                if (!empty($value[1]) && !empty($value[0])) {
                    $data1[$i][] = [
                        'size' => $value[0],
                        'soluong' => $value[1],
                    ];
                }
            }
        }
        // debug($data1);
        $errors = validateProduct($data,$data1,$product_img);
        if(!empty($errors)){
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
            exit();
        }
        //end validate

        insert('sanpham', $data);
//         //xử lý biến thể
        $lastID = lastID('sanpham');
        for ($i = 1; $i <= $soluong; $i++) {
            $data = [
                'hh_id' => $lastID,
                'mau' => $variant[$i]['mau'],
            ];
            insert('mauhh', $data);
            $lastIDmau = lastID('mauhh');
            foreach ($variant[$i]['size'] as $value) {
                if (!empty($value[1]) && !empty($value[0])) {
                    $data = [
                        'hh_id' => $lastID,
                        'mau_id' => $lastIDmau,
                        'size' => $value[0],
                        'soluong' => $value[1],
                    ];
                    insert('sizehh', $data);
                }
            }
        }
// //xử lý hình ảnh
        if (!empty($product_img)) {
            for ($i = 0; $i < $countimg; $i++) {
                $product_imgs[$i]['name'] = $product_img['name'][$i];
                $product_imgs[$i]['tmp_name'] = $product_img['tmp_name'][$i];
                $data['hinh'] = upload_file($product_imgs[$i], 'uploads/');
                $data = [
                    'hinh' => $data['hinh'],
                    'hh_id' => $lastID,
                ];
                insert('hinhhh', $data);
            }
        }
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productDelete($id)
{
    delete2('sanpham', $id);
    header('Location: ' . BASE_URL_ADMIN .  '?act=product');
    exit();
}
function validateProduct($data, $data1, $data2)
{
    $errors = [];
    //check ten hàng hóa
    if (!empty($data)) {
        if (empty($data['ten_hh'])) {
            $errors['ten_hh'] = 'Họ tên bắt buộc phải nhập';
        }
        //check dongia
        if (empty($data['don_gia'])) {
            $errors['don_gia'] = 'Đơn giá bắt buộc phải nhập';
        } else if ($data['don_gia'] < 0) {
            $errors['don_gia'] = 'Đơn giá phải lớn hơn 0';
        }
        //check mota
        if (empty($data['mo_ta'])) {
            $errors['mo_ta'] = 'Mô tả bắt buộc phải nhập';
        }
    }
    if ($data2['name'][0] == "") {
        //check hinh
        $errors['hinh'] = 'Hình ảnh không được để trống';
    }
    if (!empty($data1)) {
        //check mota
        for ($i=1; $i <= sizeof($data1) ; $i++) { 
            if (empty($data1[$i][1]['size'])) {
                $errors[$i]['size'] = 'Bắt buộc chọn size';
            }
            if (empty($data1[$i][1]['soluong'])) {
                $errors[$i]['soluong'] = 'Bắt buộc nhập số lượng';
            } elseif ($data1[$i][1]['soluong'] < 0) {
                $errors[$i]['soluong'] = 'Số lượng lớn hơn 0';
            }
        }
    }
    return $errors;
}
