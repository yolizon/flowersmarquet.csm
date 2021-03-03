<?php
require_once APP.'/models/Category.php';
require_once ROOT.'/core/Controller.php';

class CategoryController extends Controller 
{
    public function __construct()
    {
        parent::__construct('admin');
    }
    public function index(){
   
        $categories =(new Category())->all();
        $this->render('admin/categories/index', ['categories'=>$categories]);
    }

    public function create(){
        $this->render('admin/categories/create');
    }

    public function store(){
        $db = new Connection();
        $sql = "INSERT INTO categories(name, status) VALUES(?, ?)";
        $status = $_POST['status'] ? 1:0;
        $data = [$_POST['name'], $status];
        $stmt = $db->pdo->prepare($sql);
        
        if($stmt->execute($data)){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location: $redirect");
        }

    }

    public function edit($params){
        //var_dump($params);
        extract($params);
        $category=(new Category())->getByPK($id);
        $this->render('admin/categories/edit', ['category'=>$category]);
    }
    public function delete($params){
        //$this->render('admin/categories/delete');
        var_dump($params);
    }
}