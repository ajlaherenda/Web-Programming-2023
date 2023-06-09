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
 *         response="200",
 *         description="Successfull retrieval of admin."
 *     )
 * )
 */

Flight::route('POST /login', function () {
    $data = Flight::request()->data->getData();
    $username = $data['username'];
    $password = $data['password'];
    if (is_string($username) && is_string($password)) {
        return Flight::adminService()->login($data);
    } else {
        return Flight::json(['message' => "Invalid parameter types."], 400);
    }
});
