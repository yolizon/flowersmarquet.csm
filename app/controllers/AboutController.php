<?php
// $title ="About page";
$address = conf('about');
render('about/index', ['address'=>$address[0]]);