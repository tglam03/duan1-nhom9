<?php 
function comment(){
    $title = 'Danh sách bình luận';
    $view = 'comment/index';
    $script = 'datatable';
    $style = 'datatable';
    $products = listAll('sanpham');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentShowOne($id){
    $title = 'Danh sách bình luận';
    $script = 'datatable';
    $style = 'datatable';
    $view = 'comment/show';
    $comment = loadall_comment($id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function commentDelete($id,$idhh){
    $title = 'Danh sách bình luận';
    $view = 'comment/show';
    $script = 'datatable';
    $style = 'datatable';
    delete2('binh_luan',$id);
    $comment = loadall_comment($idhh);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
