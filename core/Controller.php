<?php
require_once ROOT.'/core/view.php';
require_once ROOT.'/core/response.php';
require_once ROOT.'/core/request.php';

class Controller 
{
    public string $layout;
    protected View $view;
    public $response;
    public $request;

    public function __construct(string $layout, Response $response=null, Request $request=null)
    {
        $this->response = $response ?? new Response();
        $this->request = $request ?? new Request();
       
        $this->layout = $layout;
        $this->view = new View($this->layout);
    }

    public function render($view, $params=[]){
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
        
    }
}