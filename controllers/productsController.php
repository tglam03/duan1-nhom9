<?php
function listProducts(){
    $title = 'Danh sách sản phẩm';
    $view = 'products/products';
    $style = 'listing';
    $script = 'listing';
    $productnew = lastload8sp('sanpham',0,12);
    require_once PATH_VIEW . 'layouts/client.php';
}