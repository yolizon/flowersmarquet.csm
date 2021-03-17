<?php
require_once ROOT."/core/model.php";

class Order extends Model{
    protected static string $table="orders";
    protected static string $pk="id";
}