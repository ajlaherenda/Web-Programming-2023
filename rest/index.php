<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

//require __DIR__ . '/Config.class.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/services/BaseService.php';
require __DIR__ . '/services/CarService.php';
require __DIR__ . '/services/CarAdsService.php';
require __DIR__ . '/services/TestDriveService.php';
require __DIR__ . '/services/AdminService.php';

Flight::register('carService', "CarService");

Flight::register('carAdsService', "CarAdsService");

Flight::register('testDriveService', "TestDriveService");

Flight::register('adminService', "AdminService");

//middleware login method
Flight::route('/*', function () {
    $path = Flight::request()->url;
    if ($path == '/ads/update' || $path == '/ads/del') {
        $headers = getallheaders();
        if (@!$headers['Authorization']) {
            Flight::json(["message" => "Unauthorized access"], 403);
            return false;
        } else {
            try {
                $decoded = (array)JWT::decode($headers['Authorization'], new Key(getenv('JWT_SECRET'), 'HS256'));
                return true;
            } catch (\Exception $e) {
                Flight::json(["message" => "Token authorization invalid"], 403);
                return false;
            }
        }
    }
    return true;
});

require_once __DIR__ . '/routes/CarRoutes.php';
require_once __DIR__ . '/routes/CarAdsRoutes.php';
require_once __DIR__ . '/routes/TestDriveRoutes.php';
require_once __DIR__ . '/routes/AdminRoutes.php';

Flight::start();
