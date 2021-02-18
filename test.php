
<?php

const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/connection.php';
$db = new Connection();
$sql = "SELECT * FROM categories";

$stmt = $db->pdo->prepare($sql);
$stmt->execute($data);
$result = $stmt->fetchAll();
echo "success\n\n";
var_dump($result);

#PDO
//$sql = "INSERT INTO categories(name, status) VALUES(:name, :status)";
// $sql=<<<SQL
//     DROP TABLE IF EXISTS categories;
//     CREATE TABLE categories(
//         id int(11) unsigned NOT NULL AUTO_INCREMENT,
//         name varchar(20) NOT NULL,
//         status tinyint(1) unsigned NOT NULL DEFAULT 1,
//         primary key(id)
//     );
// SQL;
// $db ->pdo->exec($sql);
// echo "success\n\n";
//print_r($db);



// SQL - база
//mysqli_init();
#$con = mysqli_connect('localhost', 'root', '', 'shop');
#if (!$con) {
    #echo mysqli_connect_error();
    #exit();
#}else{

    
   // $sql = "INSERT INTO guestbook(name, email, message) VALUES('bad cat', 'dog@my.doggie', 'hello dogs');";
  # $sql ="SELECT * FROM guestbook";
    #$result = mysqli_query($con, $sql) or die("error selecting rows".mysqli_error($con));
    #echo "Row selected Successfully";
    // while($row = mysqli_fetch_assoc($result)){
    //     var_dump($row);
    // }
   # var_dump(mysqli_fetch_all($result, MYSQLI_ASSOC));
#}

