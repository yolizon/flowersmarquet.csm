<?php
require_once ROOT."/core/model.php";

class Brand extends Model{
    protected static string $table="brands";
    protected static string $pk="id";
}