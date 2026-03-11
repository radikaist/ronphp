<?php
use App\Core\App;

// Rute Autentikasi
App::get('/login', 'AuthController@index');
App::post('/login', 'AuthController@login');
App::get('/logout', 'AuthController@logout');

// Rute Beranda
App::get('/', 'HomeController@index');

// Rute Manajemen Role
App::get('/role', 'RoleController@index');
App::get('/role/akses/{id}', 'RoleController@akses');       // Halaman Checkbox
App::post('/role/simpanAkses/{id}', 'RoleController@simpanAkses'); // Proses Simpan

// Rute Tambah Data
App::get('/user/create', 'UserController@create');
App::post('/user/store', 'UserController@store');

// Rute Edit, Update, dan Delete
App::get('/user/edit/{id}', 'UserController@edit');
App::post('/user/update/{id}', 'UserController@update');
App::get('/user/delete/{id}', 'UserController@delete');

// Rute Dinamis Detail
App::get('/user/{id}', 'UserController@detail');

// Rute Manajemen Menu
App::get('/menu', 'MenuController@index');
App::post('/menu/store', 'MenuController@store');
App::get('/menu/delete/{id}', 'MenuController@delete');