<?php

use App\Services\Router;
use App\Controllers\Controller;

Router::page('/','home');
Router::page('/addproduct','addproduct');

Router::post('/product/add', Controller::class, 'addProduct');
Router::post('/product/delete', Controller::class, 'deleteProduct');

Router::enable();