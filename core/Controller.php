<?php
require_once ROOT.'/core/view.php';
// require_once ROOT.'/core/response.php';
// require_once ROOT.'/core/request.php';
require_once ROOT.'/core/BaseController.php';
class Controller extends BaseController
{
    protected static string $layout ='app';
    protected View $view;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View(static::$layout);
    }

    public function render($view, $params=[]){
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
        
    }
}