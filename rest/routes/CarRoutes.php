<?php

/**
 * @OA\Tag(
 *     name="cars",
 *     description="Car/vehicle related operations."
 * )
**/

/**
 * @OA\Get(path="/cars/home",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars from the database. QueryWithoutParams() is an implemented function which allows custom query writting at any point.",
 *
 *     @OA\Response(response="200", description="Retrieved all cars from the database.")
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
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars from the database => their data which distinguishes them to the user in order to select a car for his/her test drive.",
 *
 *     @OA\Response(response="200", description="Retrieved the aforementioned, whose results got formated into a select option.")
 * )
 */

Flight::route('GET /cars/testdrive', function () {
    Flight::json(Flight::carService()->queryWithoutParams(
        "SELECT brand, model, year, serial_number
         FROM cars c
         JOIN car_ads ca ON ca.ad_id=c.car_ad_fk
         WHERE ca.status = 'AVAILABLE';"
    ));
});

/**
 * @OA\Get(path="/cars/availability{ad_status}",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars from the database with supplied ad_status.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="ad_status", description="Availability status like 'AVAILABLE'"),
 *
 *     @OA\Response(response="200", description="Retrieved vehicles, who enjoy the status in question.")
 * )
 */

Flight::route('GET /cars/availability/@ad_status', function ($ad_status) {
    if (is_string($ad_status) && ($ad_status == "SALE" || $ad_status == "INCOMING" || $ad_status == "AVAILABLE")) {
         Flight::json(Flight::carService()->getCarsBasedOnAdStatus($ad_status));
    } else {
          return Flight::json(['message' => 'Invalid parameter!'], 400);
    }
});

/**
 * @OA\Get(path="/cars/searchtool/{@entity}",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars whose ad description contains the data passed as entity.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="entity", description="Search data as 'Audi RS5'"),
 *
 *     @OA\Response(response="200", description="Retrieved the result set of vehicles who are a match to the entered data.")
 * )
 */

Flight::route('GET /cars/searchtool/@entity', function ($entity) {
    return Flight::json(Flight::carService()->searchTool($entity));
});

/**
 * @OA\Get(path="/cars/brands",
 *         tags = {"cars"},
 *         description="Aims to retrieve all car brands from database.",
 *
 *     @OA\Response(response="200", description="Retrieved the aforementioned result set of distinct brands.")
 * )
 */

Flight::route('GET /cars/brands', function () {
    Flight::carService()->getBrands("SELECT DISTINCT brand FROM cars;");
});

//unused routes below; not deleted in case they are required for future functionalities

/**
 * @OA\Get(path="/cars",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars from database.",
 *
 *     @OA\Response(response="200", description="Retrieved the aforementioned result set of all cars present in the database.")
 * )
 */

Flight::route('GET /cars', function () {
    Flight::json(Flight::carService()->getAll());
});

/**
 * @OA\Get(path="/cars/{@id}",
 *         tags = {"cars"},
 *         description="Aims to retrieve car with given id.",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="id", description="Car id as '24'"),
 *
 *     @OA\Response(response="200", description="Retrieved the car with provided id.")
 * )
 */

Flight::route('GET /cars/@id', function ($id) {
    Flight::json(Flight::carService()->getCarsById($id));
});

/**
 * @OA\Get(path="/cars/location/{@id}",
 *         tags = {"cars"},
 *         description="Aims to retrieve all cars who can be find at a particular location, provided the location id",
 *
 *    @OA\Parameter(@OA\Schema(type="string"), in="path", name="id", description="Location id or postal zip code as '71000'"),
 *
 *     @OA\Response(response="200", description="Retrieved the result set of vehicles whose location_id matches the passed value.")
 * )
 */

Flight::route('GET /cars/location/@id', function ($id) {
    Flight::json(Flight::carService()->getCarsByLocation($id));
});
