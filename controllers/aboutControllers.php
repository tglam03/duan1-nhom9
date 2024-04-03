<?php
function about(){
    $title = 'about';
    $view = 'about/about';
    $style = 'about';
    require_once PATH_VIEW . 'layouts/client.php';
}

// function loaihanghoaFooter(){
//     $category = listAll('loai');
//     debug($category);
//     require_once PATH_VIEW . 'layouts/client.php';
// }