<?php
return [
    ''=>'HomeController@index',
    'shop'=>'ShopController@index',
    'blog'=>'BlogController@index',
    'about'=>'AboutController@index',
    'admin'=>'Admin\DashboardController@index',
    'admin/about'=>'Admin\AboutController@index',
    'admin/about/list'=>'Admin\AboutController@list',
    'admin/categories'=>'Admin\CategoryController@index',
    'admin/categories/create'=>'Admin\CategoryController@create',
    'admin/categories/store'=>'Admin\CategoryController@store',
    'admin/categories/update'=>'Admin\CategoryController@update',
    'admin/categories/edit/{id}'=>'Admin\CategoryController@edit',
    'admin/categories/delete/{id}'=>'Admin\CategoryController@delete'

];