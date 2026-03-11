<?php

use App\Core\App;

// Rute Beranda
App::get('/', 'HomeController@index');

// Rute Tambah Data
App::get('/user/create', 'UserController@create');
App::post('/user/store', 'UserController@store');

// Rute Edit, Update, dan Delete (Harus di atas {id} agar tidak tabrakan)
App::get('/user/edit/{id}', 'UserController@edit');
App::post('/user/update/{id}', 'UserController@update');
App::get('/user/delete/{id}', 'UserController@delete');

// Rute Dinamis Detail
App::get('/user/{id}', 'UserController@detail');

// Rute Autentikasi
App::get('/login', 'AuthController@index');
App::post('/login', 'AuthController@login');
App::get('/logout', 'AuthController@logout');