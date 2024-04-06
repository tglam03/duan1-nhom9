<?php 

function dashboard(){
    $title = 'dashboard';
    $view = 'dashboard';
    $script = 'datatable';
    $style = 'datatable';
    $day = (isset($_GET['day']) && $_GET['day']!="")?$_GET['day']:1;
    $tongthunhap = loadAllofOneDay($day,'status_delivery = 3');
    $tongdonhuy = loadAllofOneDay($day,'status_delivery = -1');
    //load tất cả sản phẩm sắp xếp theo số tiền và sản phẩm bán ra theo ngày 
    $loadAllofdayProduct = loadAllofdayProduct($day,'status_delivery = 3','tienthu');
    $loadofDaytoProductQuantity = loadAllofdayProduct($day,'status_delivery = 3','total_quantity');
    // debug($loadAllofdayProduct);
    if($tongthunhap!=""){
        $tongthunhapofday = 0;
        $soluongofday = 0;
        $donhuys = 0;
        $soluongbanracua1sp = [];
        foreach ($tongthunhap as $key => $tongthunhap) {
            $tongthunhapofday += $tongthunhap['total_bill'] ;
            $soluongofday += $tongthunhap['total_quantity'];
        }
        $avgtongthunhapofOneday = (int)$tongthunhapofday/$day;
    }
    if($tongdonhuy!=""){
        $donhuys = sizeof($tongdonhuy);
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
