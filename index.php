<?php
session_start();

@define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)));
require 'Macaw.php';
require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;

Macaw::post('/control/login', 'Core\ServiceController@login');
Macaw::get('/control/logout', 'Control\ControlController@logout');

Macaw::get('control/table/records', 'Control\СontrolController@showTable');

Macaw::get('control/table/add', 'Control\СontrolController@showFormAdd');
Macaw::post('control/table/add', 'Control\СontrolController@add');

Macaw::get('control/table/edit/(:num)', 'Control\ControlController@showFormEdit');
Macaw::post('control/table/edit', 'Control\controlController@editRecord');

Macaw::get('page/user', 'App\СontrolController@showPostsForUser');

Macaw::get('control/table/records/delete/(:num)', 'Control\ControlController@deleteContact');
Macaw::error(function () {
    echo '404 :: Not Found';
});

  Macaw::dispatch();
