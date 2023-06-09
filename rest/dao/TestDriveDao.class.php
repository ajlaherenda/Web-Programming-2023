<?php

require_once __DIR__ . '/BaseDao.class.php';

class TestDriveDao extends BaseDao
{
    /**
    * constructor of dao class
    */
    public function __construct()
    {
        parent::__construct("testdrives");
    }
    public function addTestDrive($entity)
    {
        $query = "INSERT INTO " . $this->table_name . " (";
        foreach ($entity as $column => $value) {
            $query .= $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($entity as $column => $value) {
            $query .= ":" . $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ")";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity); // sql injection prevention
        $entity['id'] = $this->conn->lastInsertId();
        return $entity;
    }
    public function checkAvailability($car, $date, $time)
    {
        $stmt = $this->conn->prepare(
            "SELECT * 
            FROM testdrives
            WHERE vehicle = :vehicle  AND date= :date AND time = :time;"
        );
        $stmt->execute(['vehicle' => $car, 'date' => $date, 'time' => $time]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
}
