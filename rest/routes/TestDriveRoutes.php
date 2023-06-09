<?php

/**
 * @OA\Tag(
 *     name="test drive",
 *     description="Test drive related operations."
 * )
**/

/**
 * @OA\Post(
 *     path="/booking",
 *     summary="Creates a test drive booking - with the supplied example.",
 *     description="Established booking using data supplied through a form on the frontend side.",
 *     operationId="bookTestDrive",
 *     tags={"test drive"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                @OA\Property(
 *                   property="surname",
 *                 type="string"
 *              ),
 *                @OA\Property(
 *                   property="phone",
 *                 type="string"
 *              ),
 *                @OA\Property(
 *                   property="email",
 *                 type="string"
 *              ),
 *                @OA\Property(
 *                   property="vehicle",
 *                 type="string"
 *              ),
 *                @OA\Property(
 *                   property="date",
 *                 type="string"
 *              ),
 *                @OA\Property(
 *                   property="time",
 *                 type="string"
 *              )
 *                 ),
 *                 example = {"name" : "Ajla", "surname" : "Herenda", "phone" : "+387666666", "email" : "ajla.herenda@stu.ibu.edu.ba", "vehicle" : "Audi A5 S0635838", "date" : "12.12.2023.", "time" : "AM"}
 *             )
 *     ),
 *
 *     @OA\Response(
 *          response="200",
 *          description="Test drive was successfully booked."
 *      )
 *  )
 */

Flight::route('POST /booking', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::testDriveService()->addTestDrive($data));
});
