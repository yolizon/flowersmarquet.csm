<?php
// $title ="Blog page";
require_once ROOT.'/core/Controller.php';
class BlogController extends Controller {
    protected static string $layout='app';
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->render('blog/index');
    }
   
}
