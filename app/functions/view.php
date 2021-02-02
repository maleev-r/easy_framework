<?php

use App\Classes\view;

function view($view_path, $data = array())
{
    return new view($view_path, $data);
}