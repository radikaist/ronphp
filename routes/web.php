<?php

use App\Core\App;

// Rute Statis
App::get('/', 'HomeController@index');

// Rute Dinamis (Menangkap Parameter ID)
App::get('/user/{id}', 'UserController@detail');