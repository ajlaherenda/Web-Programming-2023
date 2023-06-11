<?php

require_once 'BaseService.php';
require_once __DIR__ . "/../dao/LocationDao.class.php";

class LocationService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CarDao());
    }
    public function getById($id)
    {
        return $this->dao->getById($id);
    }
    public function deleteLocation($id)
    {
        return $this->dao->deleteLocation($id);
    }
    public function add($entity)
    {
        return $this->dao->add($entity);
    }
    public function update($entity)
    {
        return $this->dao->update($entity);
    }

}
