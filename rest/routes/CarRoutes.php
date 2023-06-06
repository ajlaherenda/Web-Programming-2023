<?php

   Flight::route('/', function(){
      echo "U rutama sam";
   });


   Flight::route('GET /api/cars', function(){
      Flight::json(Flight::carService()->getAll());
   });
   
   Flight::route('GET /api/cars/home', function(){
      Flight::json(Flight::carService()->queryWithoutParams(
         "SELECT c.brand, c.model, c.price, c.pdv_price, c.year, ca.title, ca.imaging_path, ca.description,  c.transmission, c.engine_power, c.mileage
          FROM cars c
          JOIN car_ads ca ON ca.ad_id=c.car_ad_fk;"));
   });

   Flight::route('GET /api/cars/@id', function($id){
      Flight::json(Flight::carService()->getCarsById($id));
   });

   Flight::route('GET /api/cars/location/@id', function($id){
      Flight::json(Flight::carService()->getCarsByLocation($id));
   });

   Flight::route('GET /api/cars/availability/@ad_status', function($ad_status){
      Flight::json(Flight::carService()->getCarsBasedOnAdStatus($ad_status));
   });

   Flight::route('POST /api/cars', function(){
      $data = Flight::request()->data->getData();
      Flight::json(Flight::carService()->addCar($data));
   });

   Flight::route('PUT /api/cars/@id', function($id){
      $data = Flight::request()->data->getData();
      Flight::carService()->updateCar($id, $data);

   Flight::json(Flight::carService()->getCarsById($id));
   });

   Flight::route('DELETE /api/cars/@id', function($id){
     Flight::carService()->deleteCar($id);
   });

   Flight::route('GET /api/cars/brands', function(){
      Flight::carService()->getBrands("SELECT DISTINCT brand FROM cars;");
    });

   Flight::route('GET /api/cars/searchtool/@entity', function($entity){
      return Flight::json(Flight::carService()->searchTool($entity));
   });

   
?>