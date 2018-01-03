<?php

namespace App;

class View
{
    public function render(String $filename = '', array $data = [])
    {
        ob_start();
        require_once __DIR__ . "/../views/" .$filename.".php";
        ob_end_flush();
    }
}
