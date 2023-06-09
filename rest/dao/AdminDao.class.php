<?php

require_once __DIR__ . '/BaseDao.class.php';

class AdminDao extends BaseDao
{
    /**
    * constructor of dao class
    */
    public function __construct()
    {
        parent::__construct("admins");
    }
    public function getAdminByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
    // methods for Unit testing
    public function getTableName()
    {
        return $this->table_name;
    }
}
