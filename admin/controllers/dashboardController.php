<?php 

function dashboard(){
    $title = 'dashboard';
    $view = 'dashboard';
    $day = (isset($_GET['day']) && $_GET['day']!="")?$_GET['day']:1;
    $tongthunhap = loadAllofOneDay($day,'status_delivery = 3');
    $tongdonhuy = loadAllofOneDay($day,'status_delivery = -1');
    if($tongthunhap!=""){
        $tongthunhapofday = 0;
        $soluongofday = 0;
        $donhuys = 0;
        foreach ($tongthunhap as  $tongthunhap) {
            $tongthunhapofday += $tongthunhap['total_bill'] ;
            $soluongofday += $tongthunhap['quantity'];
        }
        if($tongdonhuy!=""){
            $donhuys = sizeof($tongdonhuy);
        }
        $avgtongthunhapofOneday = (int)$tongthunhapofday/$day;
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
