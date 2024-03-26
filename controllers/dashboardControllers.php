<?php 
function dashboard(){
    $title = 'dashboard';
    $view = 'dashboard';
    $style = 'home_1';
    $script = 'home_1';
    $productnew = lastloadLimit('sanpham',0,8);
    $producttopselling = lastloadLimit('sanpham',0,8);
    $producthot = lastloadLimit('sanpham',0,5);
    require_once PATH_VIEW . 'layouts/client.php';
}
