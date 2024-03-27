<?php
function productDetail(){
    $title = 'Danh sách sản phẩm';
    $view = 'products/productDetail';
    $style = 'productDetail';
    $script = 'productDetail';
    $category = listAll('loai');
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $products = array(showOne('sanpham',$_GET['id']));
        $productsColors = showAllVariantProduct('mauhh',$_GET['id']);
        $productsSizes = showAllVariantProduct('sizehh',$_GET['id']);
        $products1 = movearray($products, $productsColors, $productsSizes);
        $products = productConvert($products1);
        $productscungloai = loadAllspcungloai('sanpham',$products[0]['loai_id'],$products[0]['id']);
    }else{
        e404();
    }
    require_once PATH_VIEW . 'layouts/client.php';
}