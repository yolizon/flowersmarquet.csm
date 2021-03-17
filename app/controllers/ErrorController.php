<?php
// $title ="Home page";
require_once ROOT.'/core/Controller.php';
class ErrorController extends Controller {
    protected static string $layout='app';
    public function __construct()
    {
        parent::__construct();
    }
    public function errors($errors=[]){
        $this->render('errors/index', $errors);
    }
   
}
