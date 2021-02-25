<?php
// $title ="Blog page";
require_once ROOT.'/core/Controller.php';
class BlogController extends Controller {
    public function __construct()
    {
        parent::__construct('app');
    }
    public function index(){
        $this->render('blog/index');
    }
   
}
