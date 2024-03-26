<?php
function listProducts(){
    $title = 'Danh sách sản phẩm';
    $view = 'products/products';
    $style = 'listing';
    $script = 'listing';
    $script1 = 'scripts';
    $productnew = listAll('sanpham');
    $tongsp = sizeof($productnew);
	$end = 1;
	$sotrang = ceil($tongsp/$end);
	$page = isset($_GET['page'])?$_GET['page']:1;
	$star = ($page-1)*1;
    $selectedValue = isset($_GET['sort']) ? $_GET['sort'] : 'popularity';
    $productnew = locProduct($selectedValue, 'sanpham', $star, $end);
    require_once PATH_VIEW . 'layouts/client.php';
}