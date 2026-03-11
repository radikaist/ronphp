<?php

use App\Core\App;

// Rute Beranda
App::get('/', 'HomeController@index');

// Rute Tambah Data (Harus di atas rute {id})
App::get('/user/create', 'UserController@create');   // Menampilkan Form
App::post('/user/store', 'UserController@store');    // Memproses Data Form

// Rute Dinamis Detail
App::get('/user/{id}', 'UserController@detail');