<?php

class Connection 
{
    public $pdo;
    private $config =[];
    public function __construct(){
        $this->config =require_once DB_CONFIG;
        $dsn = $this->makeDSn($this->config['db']);

        try{
            $this->pdo = new PDO($dsn, $this->config
            ['user'], $this->config['password'], $this->config['option']);
        }catch(PDOException $e){
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }


    private function makeDSn(array $config){
        $dsn = $config['driver'].':';
        unset($config['driver']);
        foreach ($config as $key => $value) {
            $dsn .=$key.'='.$value.';';
        }
        return substr($dsn, 0, -1);
    }
}