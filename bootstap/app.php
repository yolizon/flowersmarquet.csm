<?php

define('ROOT', dirname(__DIR__));

const APP = ROOT.'/app';
const VIEWS = APP.'/views';
//echo VIEWS;
const CONTROLLERS = APP.'/controllers';
function render($view){
    ob_start();
    $content = renderView($view);
    require_once VIEWS.'/layouts/app.php';
    
   echo str_replace('{{content}}', $content, ob_get_clean()); 
}
function renderView($view){
    ob_start();
    require_once VIEWS."/$view.php";
    return ob_get_clean();
}


switch($_SERVER['REQUEST_URI']){
    case '/':
        include CONTROLLERS."/HomeController.php";
        break;
    case '/blog':
        include CONTROLLERS."/BlogController.php";
        break;
    case '/shop':
        include CONTROLLERS."/ShopController.php";
        break;
    case '/about':
        include CONTROLLERS."/AboutController.php";
        break;
    default:
        echo  "<h1>oops 404</h1>" ;
        break;
}