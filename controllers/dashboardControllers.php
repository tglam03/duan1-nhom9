<?php 
function dashboard(){
    $title = 'dashboard';
    $view = 'dashboard';
    $style = 'home_1';
    $script = 'home_1';
    $productnew = lastload8sp('sanpham',0,8);
    $producttopselling = lastload8sp('sanpham',0,8);
    $producthot = lastload8sp('sanpham',0,5);
    require_once PATH_VIEW . 'layouts/client.php';
}
