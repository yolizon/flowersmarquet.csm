<?php
function uri(){
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    //debug_print_backtrace();
    return trim($uri, '/') ?? '';
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
                    $controller="ErrorController";
                    include_once CONTROLLERS."/ErrorController.php";
                    
                    $controller = new $controller();
                    $controller->index(['title'=>"Error Page", 'errors'=>"<li>404: Method not found</li>"]);
                }
    
    
            }else{
                $controller="ErrorController";
                include_once CONTROLLERS."/ErrorController.php";
                
                $controller = new $controller();
                $controller->index(['title'=>"Error Page", 'errors'=>"<li>404: File not found</li>"]);
    
            }
        }
    }
    
    // function error($errors, $status=404){
    //     sendHeaders($status);
    //     error_log($errors);
    //     render('errors/index', ['title'=>"Error Page", 'errors'=>$errors]);
    //     exit();
    // }
    
    if(!$response){
        $controller="ErrorController";
        include_once CONTROLLERS."/ErrorController.php";
        
        $controller = new $controller();
        $controller->index(['title'=>"Error Page", 'errors'=>"<h1>404: Oops, Page not found!</h1>"]);
    } 