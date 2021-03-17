<?php
// $title ="Shop page";
require_once ROOT.'/core/Controller.php';
require_once ROOT.'/app/models/product.php';
class ShopController extends Controller {
    protected static string $layout='app';
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->render('shop/index');
    }
    public function getProducts(){
        $sql = "SELECT products.*, categories.name as category, categories.id as categotyId FROM products
        INNER JOIN categories
        ON categories.id = products.category_id
        WHERE products.status = 1";

        $products = (new Product)->runSql($sql);
        echo json_encode($products);
    }
}