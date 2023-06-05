<?php


class Config
{
    public static function DB_HOST()
    {
        return Config::get_env("DB_HOST", "db4free.net");
    }
    public static function DB_USERNAME()
    {
        return Config::get_env("DB_USERNAME", "herendaajla");
    }
    public static function DB_PASSWORD()
    {
        return Config::get_env("DB_PASSWORD", "");
    }
    public static function DB_SCHEME()
    {
        return Config::get_env("DB_SCHEME", "cardealer");
    }
    public static function DB_PORT()
    {
        return Config::get_env("DB_PORT", "3306");
    }
  //ovo nismo dirali!!
    public static function jwtSecret()
    {
        return Config::get_env("JWT_SECRET", "");
    }
  //isto !!
    public static function get_env($name, $default)
    {
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
}
