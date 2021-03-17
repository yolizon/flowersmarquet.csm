<?php

define('ROOT', dirname(__DIR__));
require_once ROOT.'/config/app.php';


function setLogging(){
    if(APP_ENV ==='dev'){
        ini_set("desplay_startup_errors", 1);
        error_reporting(-1);
        ini_set("desplay_errors", 1);
    }else{
        error_reporting(E_ALL & ~E_NOTICE);
        ini_set("desplay_errors", 0);
    }
    ini_set("log_errors", 1);
    ini_set("error_log", LOGS.'/errors.log');
}

function init(){
    if(function_exists('date_default_timezone_set')){
        date_default_timezone_set("Europe/Kiev");
    }
    setlocale(LC_ALL, "uk_UA");
    setLogging();
}
init();

function includeWithVars($file, $params=[]){
    extract($params);
    include_once $file;
}




function conf($mix){
    $url = ROOT."/config/$mix.json"; 
    if(file_exists($url)){
        $json = file_get_contents($url);
        
        return json_decode($json, true);
    } else{
        echo "File $mix.json does not exists";
        return false;
    }
}

function isGuest(){
    if(isset($_SESSION['Logged'])){
        return false;
    }
    return true;
}


require_once ROOT.'/core/router.php';
require_once ROOT.'/core/request.php';
require_once ROOT.'/core/session.php';
Session::instance();
$router =new Router(new Request());
$router->run();