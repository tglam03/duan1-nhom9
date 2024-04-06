<?php
function comfirm(){
    $title = 'comfirm';
    $view = 'comfirm/comfirm';
    $style = 'comfirm';
    if(isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00'){
        update('orders',$_SESSION['orderid'],['thanhtoan' => 1]);
    }
    require_once PATH_VIEW . 'layouts/client.php';
}
