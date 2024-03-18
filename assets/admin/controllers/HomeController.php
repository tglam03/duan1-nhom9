<?php 

function homeindex(){
    $dataUser = getAllUser();
    debug($dataUser);

    require_once PATH_VIEW . 'home';
}