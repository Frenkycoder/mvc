<?php
/**
 * Created by PhpStorm.
 * User: Андрій Михайлов
 * Date: 29.12.2017
 * Time: 15:02
 */

namespace App;

trait Message
{
    public function regMessage($class, $msg)
    {
        return '<div class="alert alert-"'.$class.'" role="alert">"' . $msg . "</div>";
    }
}