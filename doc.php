<?php

require 'vendor/autoload.php';

$openapi = \OpenApi\Generator::scan([[getcwd() . "/rest"]]);

header('Content-Type: application/json');
echo $openapi->toJson();
