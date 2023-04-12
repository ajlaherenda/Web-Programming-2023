<?php

   Flight::route('/', function(){
      echo "U rutama sam";
   });


   Flight::route('GET /api/cars', function(){
      Flight::json(Flight::carService()->get_all());
   });


   Flight::route('GET /api/cars/@id', function($id){
      Flight::json(Flight::carService()->get_cars_by_id($id));
   });

   Flight::route('GET /api/cars/location/@id', function($id){
      Flight::json(Flight::carService()->get_cars_by_location($id));
   });

   Flight::route('GET /api/cars/sale/@ad_status', function($ad_status){
      Flight::json(Flight::carService()->get_cars_based_on_ad_status($ad_status));
   });

   Flight::route('POST /api/cars', function(){
      $data = Flight::request()->data->getData();
      Flight::json(Flight::carService()->add_car($data));
   });

   Flight::route('PUT /api/cars/@id', function($id){
      $data = Flight::request()->data->getData();
      Flight::carService()->update_car($id, $data);

   Flight::json(Flight::carService()->get_cars_by_id($id));
   });

   Flight::route('DELETE /api/cars/@id', function($id){
     Flight::carService()->delete_car($id);
   });
   
?>