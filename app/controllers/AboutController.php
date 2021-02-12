<?php

$address = conf('about');
$con = mysqli_connect('localhost', 'root', '', 'shop') or die(mysqli_connect_error());
if($_POST){
    $name=mysqli_real_escape_string($con, $_POST['name']);
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $message=mysqli_real_escape_string($con, $_POST['message']);
    $sql = "INSERT INTO guestbook(name, email, message) VALUES('$name', '$email', '$message');";
    $result = mysqli_query($con, $sql) or die("error inserting rows".mysqli_error($con));
}
$sql ="SELECT * FROM guestbook";
    $result = mysqli_query($con, $sql) or die("error selecting rows".mysqli_error($con));
$messages=mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($address);
render('about/index', ['address'=>$address, 'messages'=>$messages]);