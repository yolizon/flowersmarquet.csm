<?php
namespace App\Controllers\Admin;
use App\Models\{User, Role};



class UserController extends AdminController
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
   
        $users =(new User())->all();
        // var_dump($users);
        $this->render('admin/users/index', ['users'=>$users]);
    }

    public function create(){
        $roles =(new Role())->all();
        $this->render('admin/users/create', compact('roles'));
    }

    public function store(){
        $password = $this->request->input['password'];
        [$name, $domain] = explode('@', $this->request->input['email']);
        
        $hash = password_hash($password, PASSWORD_BCRYPT);
        (new User)->save(['name'=>$name, 'email'=>$this->request->input['email'], 'password'=>$hash, 'role_id' => $this->request->input['role_id']]);

        $this->redirect('/admin/users');

    }

    public function edit($params){
        
        extract($params);
        $user=(new User())->getByPK($id);
        $this->render('admin/users/edit', ['user'=>$user]);
        
    }
    public function update(){
           
        $status= $this->request->input['status'] ? 1:0;

        (new User())->update($this->request->input['id'], [
            'name'=> $this->request->input['name'],
            'status'=> $status ?? 0
        ]);
       
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/users';
        header("Location: $redirect");
        
    }
    public function delete($params){
        extract($params);
        if(isset($this->request->input['submit'])){
            (new User())->destroy($id);
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/users';
            header("Location: $redirect");
            exit();
        } elseif(isset($this->request->input['reset'])){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/users';
            header("Location: $redirect");
            exit();
        }
       $user = (new User())->getByPK($id);
       $this->render('admin/users/delete', ['user'=>$user]);
     
    }

}