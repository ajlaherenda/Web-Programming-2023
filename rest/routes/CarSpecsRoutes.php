<?php

Flight::route('POST /api/cars/specs', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::carSpecsService()->add_car_specs($data));
});
?>