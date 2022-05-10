<?php
//  session_start();
//  <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$con = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
);
//isset: Determina si una variable está definida y no es NULL

    if(isset($con)){
        //echo 'base de datos conectada';
    }
