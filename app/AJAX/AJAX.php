<?php
//print_r($GLOBALS['HTTP_RAW_POST_DATA']);
header("Content-Type: application/json; charset=UTF-8");

$obj = {"name":"John", "time":"2pm"};


//var_dump($send); exit;

echo json_encode($obj);
//header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);




?>