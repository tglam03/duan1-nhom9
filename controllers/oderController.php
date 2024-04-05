<?php

function orderCheckOut()
{


    $title = 'Trang thanh toán';
    $view = 'checkout/checkOut';
    $style = 'checkout';


    require_once PATH_VIEW . 'layouts/client.php';
}


function oderPurchase()
{

    if (!empty($_POST) && !empty($_SESSION['cart'])) {

        // sử lí lưu vào bảng oder và oder items

        $data                    = $_POST;
        $data['user_id']         = $_SESSION['user']['id'];
        $data['status_delivery'] = STATUS_DELIVERY_WFC;  // chờ xác nhận đơn hàng
        $data['status_payment']  = STATUS_PAYMENT_UNPAID;  // chưa thanh toán
        $data['total_bill']      = caculator_total_oder(false);
        $data['shipping']        = $_POST['shipping'];
 
        // debug($data);    
        $orderID = insert_get_last_id('orders', $data);

        foreach ($_SESSION['cart']  as $productID => $item) {
            $oderItem = [
                'order_id'      => $orderID,
                'product_id'    => $productID,
                'quantity'      => $item['quantity'],
                'price'         => $item['giam_gia'] ?: $item['don_gia'],
            ];
        }

           $errors =  validateOder($data);
            if(empty($errors)){
                insert('oder_items', $oderItem);
            }
            else{
                header('Location: ' . BASE_URL . '?act=confirm');
                exit();
            }
           
        

        // sử lí sau khi thêm
        // xóa dữ liệu ở giỏ hàng 


        deleteCartItemByCartID($_SESSION['cartID']);
        delete2('carts', $_SESSION['cartID']);

        // delete session
        unset($_SESSION['cart']);
        unset($_SESSION['cartID']);
    }

    header('Location: '. BASE_URL);
}


function validateOder($data)
{
    $errors = [];

    if (empty($data['dienthoai'])) {
        $errors[] = "Số điện thoại không được để trống";
    } else if (!preg_match("/^[0-9]*$/", $data['dienthoai'])) {
        $errors[] = 'Số điện thoại không đúng định dạng';
    } else if (strlen($data['dienthoai']) != 10) {
        $errors[] = 'Số điện thoại phải đủ 10 chữ số';
    }
    if (empty($data['diachi'])) {
        $errors[] = 'Địa chỉ bắt buộc phải nhập';
    }
   
    return $errors;
}
