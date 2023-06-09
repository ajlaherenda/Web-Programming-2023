<?php

/**
 * @OA\Tag(
 *     name="car ads",
 *     description="Car ads related operations."
 * )
**/

/**
 * @OA\Post(
 *     path="/ads/update",
 *     summary="Updates the car ad status - with the supplied example.",
 *     description="Update of the car ad status is achieved based on the admin's choice.",
 *     operationId="updateCarAd",
 *     tags={"car ad"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="button",
 *                     type="string"
 *                 ),
 *                @OA\Property(
 *                   property="car_id",
 *                 type="string"
 *              )
 *                 ),
 *                 example={"button": "A", "car_id": "1"}
 *             )
 *     ),
 *     @OA\Response(
 *              response="200",
 *              description="Car ad status has been updated!"
 *      )
 *  )
 */

Flight::route('PUT /ads/update', function () {
    $data = Flight::request()->data->getData();
    if (is_int($data['car_id']) && is_int($data['button'])) {
        Flight::json(Flight::carAdsService()->updateCarAd($data));
    } else {
        return Flight::json(['message' => 'Invalid input values!'], 400);
    }
});

/**
 * @OA\DELETE(
 *     path="/ads/del",
 *     summary="Deletes a car ad - with the supplied example.",
 *     description="Deletes the car ad based on the admin's choice.",
 *     operationId="deleteCarAd",
 *     tags={"car ad"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="car_id",
 *                     type="string"
 *                 ),
 *                 example={"car_ad": "1"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *              response="200",
 *              description="Car ad has been deleted."
 *      )
 *  )
 */

Flight::route('DELETE /ads/del', function () {
    $data = Flight::request()->data->getData();
    if (is_int($data['id'])) {
        Flight::json(Flight::carAdsService()->deleteCarAd($data));
    } else {
        return Flight::json(['message' => 'Invalid input value!'], 400);
    }
});
