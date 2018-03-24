<?php 

    if(!defined('__CONFIG__')) {
        exit('No config');
    }
    
    error_reporting(-1);
    ini_set('display_errors', 'On');


    include_once "../classes/DB.php";
    include_once "../classes/filter.php";

    $con = DB::getConnection();
?>