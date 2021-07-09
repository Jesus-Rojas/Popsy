<?php
    session_start();
    if($_SESSION){
        $sessiones = 1;
    }else{
        $sessiones = 0;
        session_unset();
        session_destroy();
    }
    echo json_encode($sessiones)
?>