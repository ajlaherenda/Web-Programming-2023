<?php

require_once 'BaseService.php';
require_once __DIR__ . '/../Config.class.php';
require_once __DIR__ . "/../dao/AdminDao.class.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new AdminDao());
    }
    public function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $db_user = $this->dao->getAdminByUsername($username);

        if (!isset($db_user['id'])) {
            throw new Exception("User does not exist!", 400);
        }

        if ($password != $db_user['password']) {
            throw new Exception("Invalid password", 400);
        }
        unset($db_user['password']);
        $jwt = JWT::encode($db_user, Config::JWT_SECRET(), 'HS256');
        return Flight::json(['token' => $jwt]);
    }
}
