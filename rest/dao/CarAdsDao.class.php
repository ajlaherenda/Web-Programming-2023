<?php

require_once __DIR__.'/BaseDao.class.php';

class CarAdsDao extends BaseDao{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct("car_ads");
  }

   /*
   * after adding a car we will add its more detailed specs to the database
   */
  public function add_car_ad($entity){
    $query = "INSERT INTO ".$this->table_name." (";
    foreach ($entity as $column => $value) {
      $query .= $column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ") VALUES (";
    foreach ($entity as $column => $value) {
      $query .= ":".$column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ")";

    $stmt= $this->conn->prepare($query);
    $stmt->execute($entity); // sql injection prevention
    $entity['ad_id'] = $this->conn->lastInsertId();
    return $entity['ad_id'];
  }

  public function update_car_ad($id, $entity, $id_column = "ad_id"){
    $query = "UPDATE ".$this->table_name." SET ";
    foreach($entity as $name => $value){
      $query .= $name ."= :". $name. ", ";
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE {$id_column} = :id";

    $stmt= $this->conn->prepare($query);
    $entity['id'] = $id;
    $stmt->execute($entity);
    return $entity;
  }

  public function delete_car_ad($id){
    $stmt = $this->conn->prepare("DELETE FROM ".$this->table_name." WHERE ad_id=:id");
    $stmt->bindParam(':id', $id); // SQL injection prevention
    $stmt->execute();
  }


}
?>