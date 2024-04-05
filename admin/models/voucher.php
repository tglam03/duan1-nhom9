
<?php

if (!function_exists('voucherByIdProduct')) {
    function voucherByIdProduct($hh_id)
    {
        try {
            $sql = "";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":hh_id", $hh_id);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}