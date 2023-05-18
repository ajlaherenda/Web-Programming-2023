<?php

Flight::route('POST /api/cars/ads', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::carAdsService()->addCarAd($data));
});

?>