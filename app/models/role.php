<?php
require_once ROOT."/core/model.php";
class Role extends Model
{
    protected static $table = 'roles';
    protected static $primaryKey = 'id';
}
