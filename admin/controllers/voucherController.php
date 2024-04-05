<?php

function voucherListAll()
{
    $title = 'Danh Sách Voucher';
    $view = 'voucher/index';
    $script = 'datatable';
    $style = 'datatable';
    $style2 = 'style';

    $vouchers = listAll('magiamgia');


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function voucherShowOne()
{

}
function voucherCreate()
{
    $title = 'Thêm mới khách hàng';
    $view = 'voucher/create';
    $check = 1;
    if (!empty($_POST)) {

        $data = [
            "voucher"   => $_POST['voucher'] ?? null,
            "ngaybd"     => $_POST['ngaybd'] ?? null,
            "ngayketthuc"    => $_POST['ngayketthuc'] ?? null
        ];

        
        // $errors = validatevoucherCreate($data);
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        }else{
            insert('magiamgia', $data);
            
            $_SESSION['success'] = 'Thêm mới thành công';
            $check =0;
            header('Location: ' . BASE_URL_ADMIN .  '?act=voucher');
            exit();
        }
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatevoucherCreate($data)
{
    $errors = [];
    if (empty($data['voucher'])) {
        $errors[] = 'Voucher bắt buộc phải nhập';
    } 
    
    $date_regex = '%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%'; 
    // check email
    if (preg_match($date_regex,$data['ngaybd']) ==true) {
        $errors[] = 'Chưa chọn ngày bắt đầu';
    } 

   
    return $errors;
}
function voucherUpdate()
{

}
function voucherDelete()
{

}
