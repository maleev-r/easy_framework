<?php

namespace App\Controllers;

use App\Classes\controller;

class default_controller extends controller
{
    public function index(){
        view('home_page');
    }

}