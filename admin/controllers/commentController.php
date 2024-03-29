<?php 
function comment(){
    $title = 'Danh sách bình luận';
    $view = 'comment/index';
    $products = listAll('sanpham');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentShowOne($id){
    $title = 'Danh sách bình luận';
    $view = 'comment/show';
    $comment = loadall_comment($id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
