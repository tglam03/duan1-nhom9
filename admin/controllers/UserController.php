<?php

    function userListAll(){
        $title = 'Danh sách khách hàng';
        $view = 'user/index';
        $script = 'datatable';
        $script2 = 'user/script';
        $style = 'datatable';

        $users = listAll('khach_hang');

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }
    function userShowOne($id){
        

        $users = showOne('khach_hang',$id);

        if(empty($users)){
            e404();
        }


        $title = 'Chi tiết khách hàng: ' . $users['ho_ten'];
        $view = 'user/show';

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    function userCreate(){
        $title = 'Danh sách khách hàng';
        $view = 'user/create';

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    function userUpdate(){
        $title = 'Danh sách khách hàng';
        $view = 'user/update';

        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }

    function userDelete($id){
       
    }