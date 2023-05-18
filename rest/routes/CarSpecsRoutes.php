<?php

Flight::route('POST /api/cars/specs', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::carSpecsService()->addCarSpecs($data));
});
?>