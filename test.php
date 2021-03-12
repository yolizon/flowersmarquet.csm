<?php
const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/connection.php';
$db = Connection::connect();
$sql = <<<SQL
DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(25) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO `roles` (`id`, `name`) 

VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'customer');


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `role_id` int(11) unsigned NOT NULL DEFAULT '3',
 `status` tinyint(1) NOT NULL DEFAULT '1',
 `first_name` varchar(20) DEFAULT NULL,
 `last_name` varchar(20) DEFAULT NULL,
 `phone_number` varchar(13) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SQL;
 $db->exec($sql);
 echo "success\n\n";


// -- -- #SQL-products
// -- -- // $db = Connection::connect();
// -- -- // $sql = <<<SQL
// -- -- // DROP TABLE IF EXISTS products; 
// -- -- // CREATE TABLE products(
// -- -- //   id int(11) unsigned NOT NULL AUTO_INCREMENT,
// -- -- //   name varchar(255) NOT NULL,
// -- -- //   status tinyint(1) DEFAULT 1,
// -- -- //   category_id int(11) unsigned NOT NULL,
// -- -- //   brand_id int(11) unsigned NOT NULL,
// -- -- //   description text,
// -- -- //   price float unsigned NOT NULL,
// -- -- //   is_new tinyint(1) DEFAULT 1,
// -- -- //   id_recommende tinyint(1) DEFAULT 1,
// -- -- //   image varchar(255) NOT NULL,
// -- -- //   PRIMARY KEY(id)
// -- -- // )
// -- -- // SQL;

// -- -- // $db->exec($sql);
// -- -- // echo "success\n\n";




// -- #sql - categories
// -- // const ROOT = __DIR__;
// -- // require_once __DIR__.'/config/app.php';
// -- // require_once __DIR__.'/core/connection.php';
// -- // $db = new Connection();
// -- // $sql = "SELECT * FROM categories";

// -- // $stmt = $db->pdo->prepare($sql);
// -- // $stmt->execute($data);
// -- // $result = $stmt->fetchAll();
// -- // echo "success\n\n";
// -- // var_dump($result);

// -- #PDO
// -- //$sql = "INSERT INTO categories(name, status) VALUES(:name, :status)";
// -- // $sql=<<<SQL
// -- //     DROP TABLE IF EXISTS categories;
// -- //     CREATE TABLE categories(
// -- //         id int(11) unsigned NOT NULL AUTO_INCREMENT,
// -- //         name varchar(20) NOT NULL,
// -- //         status tinyint(1) unsigned NOT NULL DEFAULT 1,
// -- //         primary key(id)
// -- //     );
// -- // SQL;
// -- // $db ->pdo->exec($sql);
// -- // echo "success\n\n";
// -- //print_r($db);



// -- // SQL - база
// -- //mysqli_init();
// -- #$con = mysqli_connect('localhost', 'root', '', 'shop');
// -- #if (!$con) {
// --     #echo mysqli_connect_error();
// --     #exit();
// -- #}else{

    
// --    // $sql = "INSERT INTO guestbook(name, email, message) VALUES('bad cat', 'dog@my.doggie', 'hello dogs');";
// --   # $sql ="SELECT * FROM guestbook";
// --     #$result = mysqli_query($con, $sql) or die("error selecting rows".mysqli_error($con));
// --     #echo "Row selected Successfully";
// --     // while($row = mysqli_fetch_assoc($result)){
// --     //     var_dump($row);
// --     // }
// --    # var_dump(mysqli_fetch_all($result, MYSQLI_ASSOC));
// -- #}