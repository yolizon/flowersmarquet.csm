<?php
namespace Core;


define('ROUTES', require_once ROOT.'/config/routes.php');

class Router 
{
    private $routes = ROUTES;
    public function __construct(Request $request)
    {
        $this->request = $request ?? new Request();
    }

    public function run(){
        if(array_key_exists($this->request->uri(), $this->routes)){
            return $this->init($this->routes[$this->request->uri()]);
        }else{
           
            foreach ($this->routes as $key => $value) {
                $pattern = "@^" . preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)',$key)."$@";
                
                preg_match($pattern, $this->request->uri(), $matches);
                array_shift($matches);

                if($matches){
                    $arr = $value;
                    $arr[] = $matches;
                    
                    return $this->init(...$arr);
                }
            }
            return $this->init($this->routes['errors']);
        }

    }


    private function init($path, $params=[]){
        [$controller, $action] = explode('@', $path);
        $controller = "\\App\Controllers\\".$controller;
        $controller = new $controller();

        return $controller->$action($params);

    }

}
// function getController($path){
//     $segments = explode('\\', $path);
//     $sufix = array_pop($segments);
//     $prefix = array_pop($segments);
//     $prefix = $prefix?"/$prefix":'';
    
//     $segments = explode('@', $sufix);
//     $action = array_pop($segments);
//     $controller = array_pop($segments);
    
    
//     return [$prefix, $controller, $action];
//     }
    
//     $routes = require_once ROOT.'/config/routes.php';
//     $response = false;
//     foreach ($routes as $key => $value) {
//         if ($key == uri()){
//             list($prefix, $controller, $action)=getController($value);
//             if(file_exists(CONTROLLERS."$prefix/${controller}.php")){
//             include_once CONTROLLERS."$prefix/${controller}.php";
            
//             $controller = new $controller();
//                 if(method_exists($controller, $action)){
//                     $controller->$action();
//                     $response = true;
//                     break;
//                 }else{
//                     $controller="ErrorController";
//                     include_once CONTROLLERS."/ErrorController.php";
                    
//                     $controller = new $controller();
//                     $controller->index(['title'=>"Error Page", 'errors'=>"<li>404: Method not found</li>"]);
//                 }
    
    
//             }else{
//                 $controller="ErrorController";
//                 include_once CONTROLLERS."/ErrorController.php";
                
//                 $controller = new $controller();
//                 $controller->index(['title'=>"Error Page", 'errors'=>"<li>404: File not found</li>"]);
    
//             }
//         }
//     }
    
//     // function error($errors, $status=404){
//     //     sendHeaders($status);
//     //     error_log($errors);
//     //     render('errors/index', ['title'=>"Error Page", 'errors'=>$errors]);
//     //     exit();
//     // }
    
//     if(!$response){
//         $controller="ErrorController";
//         include_once CONTROLLERS."/ErrorController.php";
        
//         $controller = new $controller();
//         $controller->index(['title'=>"Error Page", 'errors'=>"<h1>404: Oops, Page not found!</h1>"]);
//     } 