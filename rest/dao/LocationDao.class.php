<?php

require_once __DIR__ . '/BaseDao.class.php';

class LocationDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("locations");
    }
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }
    /**
    * Delete todo record from the database
    */
    public function deleteLocation($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE location_id=:id");
        $stmt->bindParam(':id', $id); // SQL injection prevention
        $stmt->execute();
    }
    public function add($entity)
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
        $entity['location_id'] = $this->conn->lastInsertId();
        return $entity;
    }
    public function update($id, $entity, $id_column = "location_id")
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
}
