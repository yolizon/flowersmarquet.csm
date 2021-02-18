<?php
require_once ROOT.'/core/connection.php';

class CategoryController
{
    public function index(){
        $db = new Connection();
        $sql = "SELECT * FROM categories";

        $stmt = $db->pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        render('admin/categories/index', ['categories'=>$categories], 'admin');
        
    }
    public function create(){
        render('admin/categories/create', [], 'admin');
    }
    public function store(){
        $db = new Connection();
        $sql = "INSERT INTO categories(name, status) VALUES(?, ?)";
        $status =$_POST['status']? 1:0;
        $data=[$_POST['name'], $status];
        $stmt=$db->pdo->prepare($sql);
        if($stmt->execute($data)){
            $redirect ="http://".$_SERVER['HTTP_HOST'].'/admin/categories';
            header("Location:$redirect");
        }
    }
}