<?php

use App\Core\App;

// Format: App::get('/url', 'NamaController@namaMethod');
App::get('/', 'HomeController@index');