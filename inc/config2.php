<?php 

    if(!defined('__CONFIG__')) {
        exit('No config');
    }
    
    if(!isset($_SESSION)){
        session_start();
    }


    error_reporting(-1);
    ini_set('display_errors', 'On');


    include_once $_SERVER['DOCUMENT_ROOT']."/faultline/classes/DB.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/faultline/classes/filter.php";

    $con = DB::getConnection();
?>