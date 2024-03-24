<?php 
function dashboard(){
    $title = 'dashboard';
    $view = 'dashboard';
    $product = lastload8sp('sanpham');
    require_once PATH_VIEW . 'layouts/client.php';
}
