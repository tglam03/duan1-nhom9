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
    $script = 'dashboard';
    $view = 'products/index';

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