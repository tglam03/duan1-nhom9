<?php

function thongke()
{
    $title = 'thongke';
    $view = 'thongke/thongke';
    $script = 'datatable';
    $style = 'datatable';
    $day = (isset($_GET['day']) && $_GET['day'] != "") ? $_GET['day'] : 1;
    $products = listAll('sanpham');
    $productsColors = listAll('mauhh');
    $productsSizes = listAll('sizehh');
    $products = movearray($products, $productsColors, $productsSizes);
    $products = productConvert($products);
    $tongthunhap = loadAllofOneDay($day, 'status_delivery = 3');
    $tongdonhuy = loadAllofOneDay($day, 'status_delivery = -1');
    //load tất cả sản phẩm sắp xếp theo số tiền và sản phẩm bán ra theo ngày 
    $loadAllofdayProduct = loadAllofdayProduct($day, 'status_delivery = 3', 'tienthu');
    $loadofDaytoProductQuantity = loadAllofdayProduct($day, 'status_delivery = 3', 'total_quantity');
    $donhangchoxacnhan = loadAllofOneDay($day, 'status_delivery = 0');
    $donhangdanglay = loadAllofOneDay($day,'status_delivery = 1');
    $donhangchogiao = loadAllofOneDay($day,'status_delivery = 2');
    $tongdondagiao = loadAllofOneDay($day, 'status_delivery = 3');
    $vocherofday = listAll('magiamgia');
    if ($tongthunhap != "") {
        $tongthunhapofday = 0;
        $soluongofday = 0;
        $donhuys = 0;
        $soluongbanracua1sp = [];
        foreach ($tongthunhap as $key => $tongthunhap) {
            $tongthunhapofday += $tongthunhap['total_bill'];
            $soluongofday += $tongthunhap['total_quantity'];
        }
        $avgtongthunhapofOneday = (int)$tongthunhapofday / $day;
    }
    if ($tongdonhuy != "") {
        $donhuys = sizeof($tongdonhuy);
    }
    if (isset($_GET['idorder']) && !empty($_GET['idorder'])) {
        if (isset($_GET['status_delivery']) && !empty($_GET['status_delivery'])) {
            $data=[];
            $data=[
                'status_delivery' => $_GET['status_delivery'],
            ];
            update('orders',$_GET['idorder'], $data);
            header('Location:'.BASE_URL_ADMIN.'?act=thongke&day='.$day.'');
        }
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
