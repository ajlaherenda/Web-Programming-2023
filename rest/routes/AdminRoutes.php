<?php

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="admin",
 *     description="Admin login related operations."
 * )
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value.",
 *     description="Example info",
 *     @OA\Contact(name="Swagger API Team")
 * )
 * @OA\Server(
 *     url="http://localhost:8888/Web-Programming-2023/",
 *     description="API server"
 * )
 *
 */

class OpenApiSpec
{
}

/**
 * @OA\Post(
 *     path="/login",
 *     summary="Performs login - with the supplied example.",
 *     description="Admin login. Disclaimer => admins are manually added to the db.",
 *     operationId="adminLogin",
 *     tags={"admin"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="username",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *
 *                 example={"username": "ajlaadmin", "password": "probnipas"}
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

Flight::route('POST /login', function () {
    $data = Flight::request()->data->getData();
    return Flight::adminService()->login($data);
});
