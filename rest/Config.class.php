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
        return Config::get_env("DB_PASSWORD", "sifrazabazu2023");
    }
    public static function DB_SCHEME()
    {
        return Config::get_env("DB_SCHEME", "cardealer");
    }
    public static function DB_PORT()
    {
        return Config::get_env("DB_PORT", "3306");
    }
    public static function JWT_SECRET()
    {
        return Config::get_env("JWT_SECRET", "mintzelenabojazanokte");
    }
    public static function get_env($name, $default)
    {
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
    public static function SMTP_USERNAME()
    {
        return Config::get_env("SMTP_USERNAME", "postmaster@sandboxa2e9e3b67ff74d1b9f17ee949ed10b29.mailgun.org");
    }
    public static function SMTP_PASSWORD()
    {
        return Config::get_env("SMTP_PASSWORD", "0c2c567eab8dff25ee2fb4a84210edba-07ec2ba2-5f6f8a56");
    }
}
