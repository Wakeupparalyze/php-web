<?php


namespace App;


class Helper
{

    /**
     * @param $some
     * отладочная функция
     */
    public static function dd($some)
    {
        echo '<pre>';
        print_r($some);
        echo '</pre>';
    }

    /**
     * @param $url
     * редирект на указаный URL
     */
    public static function goUrl(string $url)
    {
        echo '<script type="text/javascript">location="';
        echo $url;
        echo '";</script>';
    }
}