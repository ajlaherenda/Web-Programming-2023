<?php
require 'vendor/autoload.php';
Flight::route('/', function (){
    echo "Hello World";
});
Flight::route('/', function() {
    echo "Ajla";
    echo "Faris";
});
Flight::start();
?>