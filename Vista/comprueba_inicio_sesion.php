<?php 

    session_start();

    

    if(!isset($_SESSION['id'])){

        echo json_encode("Error");
    }else{

        echo json_encode("Aceptar");
    }
?>