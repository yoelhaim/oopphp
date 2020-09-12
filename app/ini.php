<?php
//ob_start();
session_start();

require_once __DIR__.'/../core/config.php';
require_once __DIR__.'/../app/inter/interdata.php';

//session_destroy();
spl_autoload_register(function($name){
    require_once  __DIR__."/../classes/{$name}.class.php";
});
 
$play = new addplay();

if($_SERVER['HTTP_HOST']== "localhost"){
    // connect localhost
    $namelocal ='/vidlap';// name after local host example : localhost/project   project is namelocal
    $http = "http://";
}else{
    // connecrt in host 
    $namelocal ='';
    $http = "https://";
}
$site =    $http.$_SERVER['HTTP_HOST'].$namelocal;
