<?php

function orderCheckOut()
{
    $title = 'Trang thanh toán';
    $view = 'checkout/checkOut';
    $style = 'checkout';
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header('Location:' . BASE_URL . '?act=cart-list');
        exit();
    }
    require_once PATH_VIEW . 'layouts/client.php';
}


function oderPurchase()
{
    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            header('Location:' . BASE_URL . '?act=oder-checkout');
            exit();
        }
        // sử lí lưu vào bảng oder và oder items
        $giamgia = (isset($_SESSION['magg']['giam']) && $_SESSION['magg']['giam'] != "") ? $_SESSION['magg']['giam'] : 0;
        $data                    = $_POST;
        $data['user_id']         = $_SESSION['user']['id'];
        $data['status_delivery'] = STATUS_DELIVERY_WFC;  // chờ xác nhận đơn hàng
        $data['status_payment']  = $_POST['status_payment']; // phương thức thanh toán 0 là thanh toán khi nhận 1 là thanh toán vnpay
        $data['total_bill']      = caculator_total_oder(false, 7000, $giamgia);
        $data['shipping']        = $_POST['shipping'];
        $data['thanhtoan'] = 0; // 0 là chưa thanh toán 1 là đã thanh toán
        // debug($data);    
        $_SESSION['orderid'] = $orderID = insert_get_last_id('orders', $data);
        $_SESSION['total_bill'] = $data['total_bill'];
        $errors =  validateOder($data);
        if (empty($errors)) {
        } else {
            header('Location: ' . BASE_URL . '?act=oder-checkout');
            exit();
        }
        foreach ($_SESSION['cart']  as $productID => $item) {
            $oderItem = [
                'order_id'      => $orderID,
                'product_id'    => $productID,
                'quantity'      => $item['mausize']['quantity'],
                'price'         => (isset($item['giam_gia']) && $item['giam_gia'] != "") ? $item['don_gia'] * (100 - $item['giam_gia']) / 100 : $item['don_gia'],
                'mau_id'         => $item['mausize']['idmau'],
                'size_id'         => $item['mausize']['idsize'],
            ];
            insert('oder_items', $oderItem);
            if (!empty($item['mausize']['idsize'])) {
                $showsizehh = showOne('sizehh', $item['mausize']['idsize']);
                if (!empty($item['mausize']['quantity'])) {
                    update('sizehh', $item['mausize']['idsize'], ['soluong' => $showsizehh['soluong'] - $item['mausize']['quantity']]);
                }
            }
        }
        // sử lí sau khi thêm
        // xóa dữ liệu ở giỏ hàng 
        deleteCartItemByCartID($_SESSION['cartID']);
        delete2('carts', $_SESSION['cartID']);

        // delete session
        unset($_SESSION['cart']);
        unset($_SESSION['cartID']);
        unset($_SESSION['magg']);
        if (isset($data['status_payment']) && $data['status_payment'] == 1) {
            header('Location:' . BASE_URL . 'vnpay_php/vnpay_create_payment.php');
            exit();
        }
        header('Location: ' . BASE_URL . '?act=comfirm');
        exit();
    }

    header('Location: ' . BASE_URL);
}


function validateOder($data)
{
    $errors = [];
    if (empty($data['user_name'])) {
        $errors['user_name'] = 'Họ tên bắt buộc phải nhập';
    } else if (strlen($data['user_name']) < 8) {
        $errors['user_name'] = 'Họ tên phải lớn hơn 8 kí tự';
    }

    if (empty($data['user_email'])) {
        $errors['user_email'] = 'Email bắt buộc phải nhập';
    } else if (!filter_var($data['user_email'],  FILTER_VALIDATE_EMAIL)) {
        $errors['user_email'] = 'Email sai định dạng';
    }

    if (empty($data['user_phone'])) {
        $errors['user_phone'] = "Số điện thoại không được để trống";
    } else if (!preg_match("/^[0-9]*$/", $data['user_phone'])) {
        $errors['user_phone'] = 'Số điện thoại không đúng định dạng';
    } else if (strlen($data['user_phone']) != 10) {
        $errors['user_phone'] = 'Số điện thoại phải đủ 10 chữ số';
    }
    if (empty($data['user_address'])) {
        $errors['user_name'] = 'Địa chỉ bắt buộc phải nhập';
    } else if (strlen($data['user_name']) < 6) {
        $errors['user_name'] = 'Địa chỉ phải lớn hơn 6 kí tự';
    }

    return $errors;
}

//lịch sử mua hàng
function orderHistory()
{
    $title = 'Lịch sử mua hàng';
    $view = 'historyOder/historyOrder';
    $style = 'cart';
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        if (isset($_GET['idorder']) && !empty($_GET['idorder'])) {
            $historyOder = historyOder($_SESSION['user']['id'], $_GET['idorder'], '', '');
        } else {
            $historyOder = listallhistoryOder($_SESSION['user']['id'], '', '');
        }
        if (!empty($historyOder)) {
            $tongsp = sizeof($historyOder);
            $end = 5;
            $sotrang = ceil($tongsp / $end);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $star = ($page - 1) * 5;
            if (isset($_GET['idorder']) && !empty($_GET['idorder'])) {
                $historyOder = "";
                $historyOder1 = historyOder($_SESSION['user']['id'], $_GET['idorder'], $star, $end);
            } else {
                $historyOder = listallhistoryOder($_SESSION['user']['id'], $star, $end);
            }
        }
    }
    require_once PATH_VIEW . 'layouts/client.php';
}

function orderCancel()
{
    $title = 'Lịch sử mua hàng';
    $view = 'historyOder/historyOrder';
    $style = 'cart';
    if (isset($_GET['ID']) && !empty($_GET['ID'])) {
        update('orders', $_GET['ID'], ['status_delivery' => -1]);
    }
    header('Location: ' . BASE_URL . '?act=orderhistory');
}
