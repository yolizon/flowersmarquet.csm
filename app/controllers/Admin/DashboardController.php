<?php
namespace App\Controllers\Admin;
use Core\Controller;


class DashboardController extends Controller {
    protected static string $layout='admin';
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

        $this->render('admin/index', ['title'=> 'Admin Dashboard'], 'admin');
    }
   
}
