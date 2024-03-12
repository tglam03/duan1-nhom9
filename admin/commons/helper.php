<?php
 // khai báo các hàm dùng global

 if(!function_exists('require_file')){
    function require_file($pathFolder){
         $files = scandir($pathFolder);

         debug($files);
    }
       
 };


 if(!function_exists('debug')){
    function debug($data){
         echo $$data;die;
    }
       
 };

?>
