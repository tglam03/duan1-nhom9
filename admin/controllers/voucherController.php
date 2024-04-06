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
function voucherCreate()
{
    $title = 'Thêm mới voucher';
    $view = 'voucher/create';
    $check = 1;
    if (!empty($_POST)) {

        $data = [
            "voucher"   => $_POST['voucher'] ?? null,
            "ngaybd"     => $_POST['ngaybd'] ?? null,
            "ngayketthuc"    => $_POST['ngayketthuc'] ?? null,
            "giam" => $_POST['tiengiam'] ?? null,
        ];


        $errors = validatevoucherCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            insert('magiamgia', $data);

            $_SESSION['success'] = 'Thêm mới thành công';
            $check = 0;
            header('Location: ' . BASE_URL_ADMIN .  '?act=voucher-create');
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
    if (preg_match($date_regex, $data['ngaybd']) == true) {
        $errors[] = 'Chưa chọn ngày bắt đầu';
    }
    if ($data['ngaybd'] >= $data['ngayketthuc']) {
        $errors[] = 'Ngày bắt đầu không được lớn hơn ngày kết thúc';
    } elseif ($data['ngaybd'] < date('d/m/Y')) {
        $errors[] = 'Ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại';
    }
    if (empty($data['giam'])) {
        $errors[] = 'Tiền giảm bắt buộc phải nhập';
    } elseif (!is_numeric($data['giam'])) {
        $errors[] = 'Tiền giảm là số';
    } elseif ($data['giam'] < 10000) {
        $errors[] = 'Tiền giảm phải lớn hơn 10,000 VND';
    }


    return $errors;
}
function voucherUpdate($id)
{
    $title = 'Cập nhật voucher';
    $view = 'voucher/update';
    $voucher = showOne('magiamgia', $id);
    $check = 1;
    if (!empty($_POST)) {

        $data = [
            "voucher"   => $_POST['voucher'] ?? null,
            "ngaybd"     => $_POST['ngaybd'] ?? null,
            "ngayketthuc"    => $_POST['ngayketthuc'] ?? null,
            "giam" => $_POST['tiengiam'] ?? null,
        ];


        $errors = validatevoucherCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
        } else {
            update('magiamgia', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công';
            $check = 0;
            header('Location: ' . BASE_URL_ADMIN .  '?act=vocher-update&id=' . $id . '');
            exit();
        }
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function voucherDelete($id)
{
    if (isset($id) && $id != "") {
        delete2('magiamgia', $id);
    }
    header('Location:' . BASE_URL_ADMIN . '?act=voucher');
}
