<?php
/**
 * Created by PhpStorm.
 * User: Андрій Михайлов
 * Date: 02.01.2018
 * Time: 16:38
 */

namespace App;

class Session
{
    public static function init()
    {
        @session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy()
    {
        // unset($_SESSION);
        session_destroy();
    }
}