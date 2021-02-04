<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/blog">Blog</a></li>
    <li><a href="/shop">Shop</a></li>
</ul>
<?php
// echo __DIR__;
// echo realpath(__DIR__.'/../bootstap/app.php');
//C:\xampp\htdocs\flowersmarquet.csm\public/../bootstap/app.php
//C:\xampp\htdocs\flowersmarquet.csm\bootstap\app.php;
//require_once realpath(__DIR__.'/../bootstap/app.php');
// echo $_SERVER['HTTP_HOST'];
// var_dump($_SERVER);

switch($_SERVER['REQUEST_URI']){
    case '/':
        include "home.php";
        break;
    case '/blog':
        include "blog.html";
        break;
    case '/shop':
        include "shop.php";
        break;
    default:
        echo  "<h1>oops 404</h1>" ;
        break;
}