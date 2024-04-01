<?php

    function getCartID($tableName, $userId) {
        try {

            // lấy dữ liệu tron db
            $cart = getCartByUserID($userId);

            if(empty($cart)){
                return insert_get_last_id('carts', [
                    'user_id' => $userId
                ]);
            }
             return $cart['id'];
        } catch (\Exception $e) {
            debug($e);
        }
    }

    function getCartByUserID($userId){

        try {

            $sql = "SELECT * FROM carts WHERE user_id = :user_id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);
    
            $stmt->bindParam(":user_id", $userId);
    
            $stmt->execute();
    
            return  $stmt->fetch();
    
        } catch (\Exception $e) {
            debug($e);
        }
      
    }
