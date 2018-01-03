<?php
/**
 * Created by PhpStorm.
 * User: Андрій Михайлов
 * Date: 29.12.2017
 * Time: 12:08
 */

namespace App;

use \PDO;
use \PDOException;

require "config.php";

class MainModel
{
    protected $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=localhost;dbname=mvc", USER, PASS);
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}