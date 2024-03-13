<?php
 // khai báo các hàm dùng global


 // dùng hàm này để require toàn bộ các file trong controller
 if(!function_exists('require_file')){
    function require_file($pathFolder){
         $files = array_diff(scandir($pathFolder),['.','..']);
          
         foreach($files as $file){
            require_once $pathFolder . '/' . $file;
         }

         
    }
       
 }


 if(!function_exists('debug')){
    function debug($data){
         echo "<pre>";

         print_r($data);

         die;
    } 
 }

?>
