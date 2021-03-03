<?php
require_once ROOT."/core/connection.php";
class Model{
    protected static string $table;
    protected static string $pk;
    public function __construct(){
        $this->conn= Connection::connect();
    }

    public function all(){
        $stmt=$this->conn->prepare(" SELECT * FROM " .static::$table);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getByPK($value){
        $stmt=$this->conn->prepare(" SELECT * FROM " .static::$table."WHERE".static::$pk.'='.$value);
        $stmt->execute();
        return $stmt->fetch();
    }
}