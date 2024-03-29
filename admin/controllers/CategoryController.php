<?php

function categoryListAll()
{

    $title = 'Danh sách loại hàng';
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $category = listAll('loai');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function categoryShowOne($id)
{

    $category = showOne('loai', $id);

    if (empty($category)) {
        e404();
    }


    $title = 'Chi tiết loại hàng: ' . $category['ten_loai'];
    $view = 'categories/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryCreate()
{
    $title = 'Danh sách khách hàng';
    $view = 'categories/create';

    if (!empty($_POST)) {

        $data = [
            "ten_loai"   => $_POST['ten_loai'] ?? null,
        ];

        // validation
        validateCategoryCreate($data);
        // end validation

        insert('loai', $data);

        $_SESSION['success'] = 'Thêm mới thành công';

        header('Location: ' . BASE_URL_ADMIN .  '?act=category');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryCreate($data)
{
    // tên - bắt buộc, độ dài tối đa 50 kí tự
    $errors = [];
    if (empty($data['ten_loai'])) {
        $errors[] = 'Loại bắt buộc phải nhập';
    } else if (strlen($data['ten_loai']) > 50) {
        $errors[] = 'Họ tên phải lớn hơn 50 kí tự';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=category-create');
        exit();
    }


    return $errors;
}
function categoryUpdate($id)
{
    $category = showOne('loai', $id);

    if (empty($category)) {
        e404();
    }

    $title = 'Cập nhật loại hàng: ' . $category['ten_loai'];
    $view = 'categories/update';


    if (!empty($_POST)) {

        $data = [
            "ten_loai"   => $_POST['ten_loai'] ?? null,
        ];


        // validation
        $erors = validateCategoryUpdate($data);
        if (empty($erors)) {
            update('loai', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công';

            header('Location: ' . BASE_URL_ADMIN .  '?act=category-update&id=' . $id);

            exit();
        }
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function validateCategoryUpdate($data)
{
    // tên - bắt buộc, độ dài tối đa 50 kí tự
    $errors = [];
    if (empty($data['ten_loai'])) {
        $errors[] = 'Tên loại bắt buộc phải nhập';
    } else if (strlen($data['ten_loai']) < 50) {
        $errors[] = 'Tên loại phải lớn hơn 50 kí tự';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
    }


    return $errors;
}


function categoryDelete($id)
{
    delete2('loai', $id);
    $_SESSION['success'] = 'Xóa thành công';
    header('Location: ' . BASE_URL_ADMIN .  '?act=category');

    exit();
}
