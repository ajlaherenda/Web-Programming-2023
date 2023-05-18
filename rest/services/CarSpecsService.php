<?php


require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarSpecsDao.class.php";
class CarSpecsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CarSpecsDao());
    }
    public function addCarSpecs($entity)
    {
        return $this->dao->addCarSpecs($entity);
    }
    public function updateCarSpecs($id, $entity)
    {
        return $this->dao->updateCarSpecs($id, $entity);
    }
    public function deleteCarSpecs($id)
    {
        return $this->dao->deleteCarSpecs($id);
    }
    // additional methods have to be implemented here in the future +
    // implement these methods in the dao class as well
}
