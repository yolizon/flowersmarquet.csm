<?php
namespace App\Controllers;

use Core\Controller;

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
