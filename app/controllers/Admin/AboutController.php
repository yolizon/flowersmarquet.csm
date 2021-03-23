<?php
namespace App\Controllers\Admin;
use Core\Controller;

class AboutController extends Controller {
    protected static string $layout='admin';
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->render('admin/contact/index', ['title'=>$title, 'data'=>$data], 'admin');
    }
    public function index(){
        $title ="Admin Contact";
        $data = conf('about');
        // $data =$data;
        $url = ROOT.'/config/about.json';
        if ($_POST) {
            if(!$_POST['email'] or !$_POST['street'] or !$_POST['city'] or !$_POST['country'] or !$_POST['mobile']){
                echo "pleeease, complete all fields";
            }else{
                $formdata =[
                    "email" => $_POST['email'],
                    "country" => $_POST['country'],
                    "city" => $_POST['city'],
                    "street" => $_POST['street'],
                    "mobile" => $_POST['mobile']
                ];
                $json = json_encode($formdata);
                if(file_put_contents($url, $json)){
                    $redirect ="http://".$_SERVER['HTTP_HOST']."/about";
                    header("Location: $redirect");
                    exit();
                }else{
                    echo "error";
                }
            }
           
        }       
    }
    public function list(){
        $con = mysqli_connect('localhost', 'root', '', 'shop') or die(mysqli_connect_error());
        $sql ="SELECT * FROM guestbook";
        $result = mysqli_query($con, $sql) or die("error selecting rows".mysqli_error($con));
        $messages=mysqli_fetch_all($result, MYSQLI_ASSOC);
        render('admin/contact/list', ['title'=>"All messages", 'messages'=>$messages], 'admin');
    }
}