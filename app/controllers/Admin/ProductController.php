<?php
namespace App\Controllers\Admin;
use Core\Controller;
use App\Models\{Brand, Product, Category};



class ProductController extends Controller 
{
    protected static string $layout='admin';
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
   
        $products =(new Product())->all();
        // var_dump($products);
        $this->render('admin/products/index', ['products'=>$products]);
    }

    public function create(){
        $brands=(new Brand())->all();
        $categories=(new Category())->all();
        $this->render('admin/products/create', compact('brands', 'categories'));
    }

    public function store(){
        
        $status= $this->request->input['status'] ? 1:0;
        $is_new= $this->request->input['is_new'] ? 1:0;
        $productImage=$this->uploadImage();
        //  var_dump($this->request->input['status']);
        //  exit();
        // if(isset($this->request->input['status'])){
        //     $status=1;
        // }else{
        //     $status=0;
        // }
        // var_dump($status);
        // exit();

        (new Product())->save([
            'name'=> $this->request->input['name'],
            'status'=> $status,
            'is_new'=>$is_new,
            'description'=>$this->request->input['description'],
            'price'=>$this->request->input['price'],
            'brand_id'=>$this->request->input['brand_id'],
            'category_id'=>$this->request->input['brand_id'],
            'image'=>$productImage
        ]);
       
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location: $redirect");

    }
    private function uploadImage(){
        if(!empty($this->request->input['image'])){
            $fileName =$this->fileName($this->request->input['image']['name']);
            move_uploaded_file($this->request->input['image']['tmp_name'], STORAGE.'/products/'.$fileName);
            return "http://".$_SERVER['HTTP_HOST']."/storage/uploads/products/".$fileName;
        
        }
    }
    private function fileName($fileName){
        return sha1(mt_rand(1, 9999).$fileName.uniqid()).time();
    }

    public function edit($params){
        
        extract($params);
        $product=(new Product())->getByPK($id);
        $this->render('admin/products/edit', compact('product'));
        
    }
    public function update(){
           
        $status= $this->request->input['status'] ? 1:0;

        (new Product())->update($this->request->input['id'], [
            'name'=> $this->request->input['name'],
            'status'=> $status ?? 0
        ]);
       
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location: $redirect");
        
    }
    public function delete($params){
        extract($params);
        if(isset($this->request->input['submit'])){
            (new Product())->destroy($id);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
            header("Location: $redirect");
            exit();
        } elseif(isset($this->request->input['reset'])){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
            header("Location: $redirect");
            exit();
        }
       $product = (new Product())->getByPK($id);
       $this->render('admin/products/delete', compact('product'));
     
    }

}