<?php

Route::get('/', 'PagesController@home');

Route::resource('products', 'ProductsController');