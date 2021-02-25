<?php
require_once ROOT.'/core/view.php';
require_once ROOT.'/core/response.php';

class Controller 
{
    public string $layout;
    protected View $view;
    public $response;

    public function __construct(string $layout, Response $response=null)
    {
        $this->response = $response ?? new Response();
        $this->layout = $layout;
        $this->view = new View($this->layout);
    }

    public function render($view, $params=[]){
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
        
    }
}