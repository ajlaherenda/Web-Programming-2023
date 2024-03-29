<?php

require_once __DIR__ . '/BaseDao.class.php';

class CarDao extends BaseDao
{
  /**
  * constructor of dao class
  */
    public function __construct()
    {
        parent::__construct("cars");
    }
    public function getCarsBasedOnAdStatus($ad_status)
    {
        $stmt = $this->conn->prepare("SELECT c.car_id, c.brand, c.model, c.price, c.pdv_price, c.year, ca.title, ca.imaging_path, ca.description,  c.transmission, c.engine_power, c.mileage, ca.status, l.location_name
            FROM cars c
            JOIN car_ads ca ON c.car_ad_fk = ca.ad_id
            JOIN locations l ON l.location_id=c.location_fk 
            WHERE ca.status = :ad_status");
        $stmt->execute(['ad_status' => $ad_status]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function searchTool($entity)
    {
        $param = "%" . $entity . "%";
        return $this->queryWithoutParams("SELECT  c.car_id, ca.status, c.brand, c.model, c.price, c.pdv_price, c.year, ca.title, ca.imaging_path, ca.description,  c.transmission, c.engine_power, c.mileage, l.location_name 
        FROM cars c  JOIN car_ads ca ON ca.ad_id=c.car_ad_fk
        JOIN locations l ON l.location_id=c.location_fk 
        WHERE lower(ca.title) LIKE '" . $param . "';");
    }
    public function getCarsById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM cars WHERE car_id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
    public function getCarsByLocation($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM cars WHERE location_fk = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
    public function addCar($entity)
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
        $entity['car_id'] = $this->conn->lastInsertId();
        return $entity;
    }
    public function updateCar($id, $entity, $id_column = "car_id")
    {
        $query = "UPDATE " . $this->table_name . " SET ";
        foreach ($entity as $name => $value) {
            $query .= $name . "= :" . $name . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= " WHERE {$id_column} = :id";

        $stmt = $this->conn->prepare($query);
        $entity['id'] = $id;
        $stmt->execute($entity);
        return $entity;
    }
    public function deleteCar($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE car_id=:id");
        $stmt->bindParam(':id', $id); // SQL injection prevention
        $stmt->execute();
    }
    public function getCarLocation($id)
    {
        $query = "SELECT l.location_name
        FROM cars c
        JOIN locations l ON c.location_fk=l.location_id
        WHERE c.car_id=:id";
        $stmt->$this->conn->prepare($query);
        $stmt->$execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
    // methods for Unit testing
    public function getTableName()
    {
        return $this->table_name;
    }
}
