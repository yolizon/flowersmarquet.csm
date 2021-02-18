<?php

define('ROOT', dirname(__DIR__));
require_once ROOT.'/config/app.php';

function sendHeaders($status = 200, $headers=[]){
    $statusTexts =[
        200 => "OK BOS",
        302 => "Found",
        400 => "Bad request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "Oops, Page not found!",
        500 => "Internal Server Error"
    ];
    $statusTexts = $statusTexts[$status];
    $version = "1.0";
    $charset = "UTF-8";

    if(headers_sent()){
        return;
    }
    header("HTTP/$version $status $statusTexts");
    if(!array_key_exists("Content-Type", $headers)){
        header("Content-Type: text/html; charset=$charset");
    }
    foreach ($headers as $key => $value) {
        header("$key: $value, true, $status");
    }
}

function render($view, $params=null, $layout='app'){
    sendHeaders();
    ob_start();
    $content = renderView($view, $params);
    require_once VIEWS."/layouts/$layout.php";
   echo str_replace('{{content}}', $content, ob_get_clean()); 
}
function renderView($view, $params){
    if ($params) {
        extract($params);
    }
    ob_start();
    require_once VIEWS."/$view.php";
    return ob_get_clean();
}

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


function uri(){
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    //debug_print_backtrace();
    return trim($uri, '/') ?? '';
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

function getController($path){
$segments = explode('\\', $path);
$sufix = array_pop($segments);
$prefix = array_pop($segments);
$prefix = $prefix?"/$prefix":'';

$segments = explode('@', $sufix);
$action = array_pop($segments);
$controller = array_pop($segments);


return [$prefix, $controller, $action];
}

$routes = require_once ROOT.'/config/routes.php';
$response = false;
foreach ($routes as $key => $value) {
    if ($key == uri()){
        list($prefix, $controller, $action)=getController($value);
        if(file_exists(CONTROLLERS."$prefix/${controller}.php")){
        include_once CONTROLLERS."$prefix/${controller}.php";
        
        $controller = new $controller();
            if(method_exists($controller, $action)){
                $controller->$action();
                $response = true;
                break;
            }else{
                error("<li>404: Method not found</li>");
            }


        }else{
            error("<li>404: File not found</li>");
        }
    }
}

function error($errors, $status=404){
    sendHeaders($status);
    error_log($errors);
    render('errors/index', ['title'=>"Error Page", 'errors'=>$errors]);
    exit();
}

if(!$response){
    $errors = "<h1>404: Oops, Page not found!</h1>";
    error($errors);
} 