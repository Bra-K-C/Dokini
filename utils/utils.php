<?php


class utils
{
    public static function IsConnected(): bool
    {
        return isset($_SESSION["user_id"]);
    }

    public static function DeleteAllCookies(){
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
            header("Refresh:0");
        }
    }
}
