<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/services/BaseService.php';
require __DIR__ . '/services/CarService.php';
require __DIR__ . '/services/CarSpecsService.php';
require __DIR__ . '/services/CarAdsService.php';

require __DIR__ . '/routes/CarRoutes.php';
require_once __DIR__ . '/routes/CarRoutes.php';
require_once __DIR__ . '/routes/CarAdsRoutes.php';
require_once __DIR__ . '/routes/CarSpecsRoutes.php';

Flight::register('carService', "CarService");

Flight::register('carSpecsService', "CarSpecsService");

Flight::register('carAdsService', "CarAdsService");

Flight::start();
