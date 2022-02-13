<?php

class View
{
    public static function load($view_name,$view_data=[])
    {
        $file = VIEWS.$view_name.".php";
        if (file_exists($file)) 
        {
            ob_start();
            extract($view_data);
            require_once($file);
            ob_end_flush();
        }
        else
        {
            echo "this view ".$view_name." do not exists";
        }
    }
}