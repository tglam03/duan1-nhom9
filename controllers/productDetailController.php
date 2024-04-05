<?php
function productDetail()
{
    $title = 'Danh sách sản phẩm';
    $view = 'products/productDetail';
    $style = 'productDetail';
    $script = 'productDetail';
    $category = listAll('loai');
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $products = array(showOne('sanpham', $_GET['id']));
        $productsColors = showAllVariantProduct('mauhh', $_GET['id']);
        $productsSizes = showAllVariantProduct('sizehh', $_GET['id']);
        $products1 = movearray($products, $productsColors, $productsSizes);
        $products = productConvert($products1);
        $productscungloai = loadAllspcungloai('sanpham', $products[0]['loai_id'], $products[0]['id']);
        $sizesoluongonecolor = loadAllonecolorOfOneProducts($_GET['id'],$products1[0]['mau_size_soluong'][0]['idmau']);
        update('sanpham', $_GET['id'], ['so_luot_xem' => $products[0]['so_luot_xem'] + 1]);
        if(isset($_GET['idmau']) && $_GET['idmau'] !=""){
            $_SESSION['idmau'] = $_GET['idmau'];
            $_SESSION['sizesoluong'] = loadAllonecolorOfOneProducts($_GET['id'],$_SESSION['idmau']);
            header('Location:'.BASE_URL.'?act=product-detail&id='.$_GET['id'].'');
            exit();
        }
    } else {
        e404();
    }
    require_once PATH_VIEW . 'layouts/client.php';
}

function validateComment($data)
{
    $errors = [];
    //check ten hàng hóa
    if (!empty($data)) {
        //check dongia
        if (empty($data['noi_dung'])) {
            $errors['noi_dung'] = 'Nội dung bắt buộc phải nhập';
        } else if ($data['noi_dung'] < 10) {
            $errors['noi_dung'] = 'Nội dung phải lớn hơn 10 ký tự';
        }
    }
    return $errors;
}