<?php
require_once ROOT."/core/model.php";

class Product extends Model{
    protected static string $table="products";
    protected static string $pk="id";
}