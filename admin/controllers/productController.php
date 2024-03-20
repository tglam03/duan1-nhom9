<?php
function productListAll(){
    $title = 'Danh Sách Sản Phẩm';
    $view = 'products/index';
    $script = 'datatable';
    $style = 'datatable';
    $products = listAll('sanpham');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreate(){
    $title = 'Thêm Mới Sản Phẩm';
    $view = 'products/add';
    $script1 = 'scripts';
    $category = listAll('loai');
    if(!empty($_POST)){
        if(empty($_POST['loai_id'])){
            $_POST['loai_id'] = NULL;
        }
        if(empty($_POST['giam_gia'])){
            $_POST['giam_gia'] = 0;
        }
        $data = [
            'ten_hh' => $_POST['ten_hh'],
            'don_gia' => $_POST['don_gia'],
            'giam_gia' => $_POST['giam_gia'],
            'loai_id' => $_POST['loai_id'],
            'soluong' => $_POST['soluong'],
            'mo_ta' => $_POST['mo_ta'],
        ];
        $hinh=$_POST['hinh'];
        insert('sanpham', $data);
        $lastID = lastID('sanpham');
        $variant = $_POST['variant'];
        $soluong = count($variant);
        for ($i=1; $i<= $soluong ; $i++) { 
            $data = [
                'hh_id' => $lastID,
                'mau' => $variant[$i]['mau'],
            ];
            insert('mauhh', $data);
            $lastIDmau = lastID('mauhh');
            foreach ($variant[$i]['size'] as $value) {
                    if(!empty($value[1]) && !empty($value[0])){
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

function productUpdate($id){
    $title = 'dashboard';
    $view = 'products/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productDelete($id){
    $view = 'products/index';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}