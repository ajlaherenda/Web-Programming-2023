<?php


require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarDao.class.php";


class CarService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CarDao());
    }
    public function getCarsById($id)
    {
        return $this->dao->getCarsById($id);
    }
    public function getCarsByLocation($id)
    {
        return $this->dao->getCarsByLocation($id);
    }
    public function getCarsSearchTool($entity)
    {
        return $this->dao->getCarsSearchTool($entity);
    }

    public function getCarsBasedOnAdStatus($ad_status)
    {
        return $this->dao->getCarsBasedOnAdStatus($ad_status);
    }

    public function addCar($entity)
    {
        return $this->dao->addCar($entity);
    }

    public function updateCar($id, $entity)
    {
        return this->dao->updateCar($id, $entity);
    }

    public function deleteCar($id)
    {
        return $this->dao->deleteCar($id);
    }
    public function getAll()
    {
        return $this->dao->getAll();
    }
}
