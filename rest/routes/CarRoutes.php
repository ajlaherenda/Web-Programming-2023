<?php

/**
 * @OA\Tag(
 *     name="cars",
 *     description="Car/vehicle related operations."
 * )
**/

/**
 * @OA\Get(path="/cars/home",
 *         tags = {"car"},
 *         description="Aims to retrieve all cars from the database. QueryWithoutParams() is an implemented function which allows custom query writting at any point.",
 *
 *     @OA\Response(response="200", description="Retrieves and displays on home page.")
 * )
 */

   Flight::route('GET /cars/home', function () {
      Flight::json(Flight::carService()->queryWithoutParams(
          "SELECT c.car_id, c.brand, c.model, c.price, c.pdv_price, c.year, ca.title, ca.imaging_path, ca.description,  c.transmission, c.engine_power, c.mileage, ca.status
          FROM cars c
          JOIN car_ads ca ON ca.ad_id=c.car_ad_fk;"
      ));
   });

/**
 * @OA\Get(path="/cars/testdrive",
 *         tags = {"car test drive"},
 *         description="Aims to retrieve all cars from the database => their data which distinguishes them to the user in order to select a car for his/her test drive.",
 *
 *     @OA\Response(response="200", description="Retrieves the aforementioned, whose results get formated into a select option.")
 * )
 */

   Flight::route('GET /cars/testdrive', function () {
      Flight::json(Flight::carService()->queryWithoutParams(
          "SELECT brand, model, year, serial_number
          FROM cars;"
      ));
   });

/**
 * @OA\Get(path="/cars/availability{ad_status}",
 *         tags = {"car availability"},
 *         description="Aims to retrieve all cars from the database with supplied ad_status.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="ad_status", description="Availability status like 'AVAILABLE'"),
 *
 *     @OA\Response(response="200", description="Retrieves vehicles, who enjoy the status in question.")
 * )
 */

   Flight::route('GET /cars/availability/@ad_status', function ($ad_status) {
      Flight::json(Flight::carService()->getCarsBasedOnAdStatus($ad_status));
   });

/**
 * @OA\Get(path="/cars/searchtool/{@entity}",
 *         tags = {"search tool"},
 *         description="Aims to retrieve all cars whose ad description contains the data passed as entity.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="entity", description="Search data as 'Audi RS5'"),
 *
 *     @OA\Response(response="200", description="Retrieves the result set of vehicles who are a match to the entered data.")
 * )
 */

   Flight::route('GET /cars/searchtool/@entity', function ($entity) {
      return Flight::json(Flight::carService()->searchTool($entity));
   });

/**
 * @OA\Get(path="/cars/brands",
 *         tags = {"car brands"},
 *         description="Aims to retrieve all car brands from database.",
 *
 *     @OA\Response(response="200", description="Retrieves the aforementioned result set of distinct brands.")
 * )
 */

   Flight::route('GET /cars/brands', function () {
      Flight::carService()->getBrands("SELECT DISTINCT brand FROM cars;");
   });

/**
 * @OA\Get(path="/cars",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars from database.",
 *
 *     @OA\Response(response="200", description="Retrieves the aforementioned result set of all cars present in the database.")
 * )
 */
   Flight::route('GET /cars', function () {
      Flight::json(Flight::carService()->getAll());
   });
/**
 * @OA\Get(path="/cars/{@id}",
 *         tags = {"cars by id"},
 *         description="Aims to retrieve car with given id.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="id", description="Car id as '24'"),
 *
 *     @OA\Response(response="200", description="Retrieves the car with provided id.")
 * )
 */

   Flight::route('GET /cars/@id', function ($id) {
      Flight::json(Flight::carService()->getCarsById($id));
   });

/**
 * @OA\Get(path="/cars/location/{@id}",
 *         tags = {"cars by location"},
 *         description="Aims to retrieve all cars who can be find at a particular location, provided the location id",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="id", description="Location id or postal zip code as '71000'"),
 *
 *     @OA\Response(response="200", description="Retrieves the result set of vehicles whose location_id matches the passed value.")
 * )
 */

   Flight::route('GET /cars/location/@id', function ($id) {
      Flight::json(Flight::carService()->getCarsByLocation($id));
   });

   Flight::route('POST /cars', function () {
      $data = Flight::request()->data->getData();
      Flight::json(Flight::carService()->addCar($data));
   });

   Flight::route('PUT /cars/update/', function () {
      $data = Flight::request()->data->getData();
      Flight::carService()->updateCar($data['car_id'], $data);

      Flight::json(Flight::carService()->getCarsById($data['car_id']));
   });

   Flight::route('DELETE /cars/del/', function () {
      $data = Flight::request()->data->getData();
      Flight::carService()->deleteCar($data['car_id']);
   });
