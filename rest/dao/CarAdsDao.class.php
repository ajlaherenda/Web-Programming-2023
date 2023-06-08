<?php

require_once __DIR__ . '/BaseDao.class.php';

class CarAdsDao extends BaseDao
{
    /**
    * constructor of dao class
    */
    public function __construct()
    {
        parent::__construct("car_ads");
    }
    /*
    * after adding a car we will add its more detailed specs to the database
    */
    public function addCarAd($entity)
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
        $entity['ad_id'] = $this->conn->lastInsertId();
        return $entity['ad_id'];
    }

    /*
    public function updateCarAd($id, $entity, $id_column = "ad_id")
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
    } */

    public function updateCarAd($data)
    {
        $button = $data['button'];
        $id = $data['car_id'];
        $query = "";

        switch ($button) {
            case 1:
                $query = "UPDATE cars
                JOIN car_ads ON car_ads.ad_id=cars.car_ad_fk
                SET car_ads.status='AVAILABLE'
                WHERE cars.car_id = $id";
                break;
            case 2:
                $query = "UPDATE cars
                JOIN car_ads ON car_ads.ad_id=cars.car_ad_fk
                SET car_ads.status='SALE'
                WHERE cars.car_id = $id";
                break;
            case 3:
                $query = "UPDATE cars
                JOIN car_ads ON car_ads.ad_id=cars.car_ad_fk
                SET car_ads.status='INCOMING'
                WHERE cars.car_id = $id";
                break;
            case 4:
                $query = "UPDATE cars
                JOIN car_ads ON car_ads.ad_id=cars.car_ad_fk
                SET car_ads.status='RESERVED'
                WHERE cars.car_id = $id";
                break;
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }


    public function deleteCarAd($data)
    {
        $id = $data['id'];
        //$stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " ca JOIN cars c ON ca.ad_id=c.car_ad_fk WHERE c.car_id=" . $id);
        return $this->queryWithoutParams("DELETE ca, c FROM cars c JOIN car_ads ca ON ca.ad_id=c.car_ad_fk WHERE c.car_id=$id");
    }
}
