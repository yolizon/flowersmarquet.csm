<?php
require_once ROOT."/core/model.php";

class Category extends Model{
    protected static string $table="categories";
    protected static string $pk="id";
}