<?php

function getAllUser(){

    try{
        $sql = "SELECT * FROM users";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }catch(\Exception $e){
        debug($e);
    }
   
}

?>