<?php

namespace App\Classes;

class Request
{
    private $post;
    private $get;
    private $server;

    public function __construct()
    {
        $this->server['request_uri'] = $_SERVER['REQUEST_URI'];
        $this->server['method'] = $_SERVER['REQUEST_METHOD'];
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function server(){
        return $this->server;
    }
    public function get(){
        return $this->get;
    }
    public function post(){
        return $this->post;
    }
}