<?php

namespace App;

class Main extends MainController
{
    public function index($a, $b, $c)
    {
        echo 'hi';
        echo $a;
        echo $b;
        echo $c;
    }
}