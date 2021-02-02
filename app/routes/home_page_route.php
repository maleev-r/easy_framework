<?php

namespace App\Routes;

use App\Classes\route;

route::get('/messages', 'message_controller');
route::get('/message/show/{id}/', 'message_controller@show');
route::get('/message/all/', 'message_controller@all');
route::get('/message/delete/{id}/', 'message_controller@delete');
route::get('/message/create/', 'message_controller@create');
