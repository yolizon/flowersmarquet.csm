<?php

require_once ROOT."/core/model.php";

class User extends Model
{
  protected static string $table = 'users';
  protected static string $pk = 'id';
}
