<?php

function dd($data)
{
    echo '<pre style="background-color: #000000; color: #FFFFFF">';
    print_r($data);
    echo '</pre>';
    exit;
}
