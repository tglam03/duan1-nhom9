<?php
function listProducts()
{
    $title = 'Danh sách sản phẩm';
    $view = 'products/products';
    $style = 'listing';
    $script = 'listing';
    $script1 = 'scripts';
    $cartory = listAll('loai');
    $productnew = listAll('sanpham');
    $tongsp = sizeof($productnew);
    $end = 5;
    $sotrang = ceil($tongsp / $end);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $star = ($page - 1) * 5;
    $selectedValue = isset($_GET['sort']) ? $_GET['sort'] : 'popularity';
    $productnew = locProduct($selectedValue, 'sanpham', $star, $end);
    if (isset($_POST['submit']) && $_POST['submit']) {
        $loaisp = (isset($_POST['loaisp']) && $_POST['loaisp'] !="")?$_POST['loaisp']:'';
        $soluotxem = (isset($_POST['soluotxem']) && $_POST['soluotxem'] !="")?$_POST['soluotxem']:'';
        $dongia = (isset($_POST['dongia']) && $_POST['dongia']!="")?$_POST['dongia']:'';
        $productnew = locselect('','sanpham',$star,$end,$soluotxem,$dongia,$loaisp);
    }
    if(isset($_GET['kywsb']) && $_GET['kywsb']){
        $kyw = (isset($_GET['kywsb']) && $_GET['kywsb'] !="")?$_GET['kywsb']:'';
        $productnew = loctenProduct($kyw);
        debug($productnew);
    }
    require_once PATH_VIEW . 'layouts/client.php';
}
