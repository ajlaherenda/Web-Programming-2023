<?php

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
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(type="boolean")
 *             },
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */

Flight::route('PUT /ads/update', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::carAdsService()->updateCarAd($data));
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
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(type="boolean")
 *             },
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */

Flight::route('DELETE /ads/del', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::carAdsService()->deleteCarAd($data));
});
