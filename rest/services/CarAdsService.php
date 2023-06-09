<?php

require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarAdsDao.class.php";

class CarAdsService extends BaseService
{
    /**
    * constructor of dao class
    */
    public function __construct()
    {
        parent::__construct(new CarAdsDao());
    }

    public function addCarAd($entity)
    {
        return $this->dao->addCarAd($entity);
    }

    public function updateCarAd($data)
    {
        $id = $data['car_id'];
        $button = $data['button'];
        $car = Flight::carService()->getCarsById($id);
        if (isset($car['car_id']) && $button < 5) {
            return $this->dao->updateCarAd($data);
        } else {
            return Flight::json(['message' => "Parameters are incorrect!"], 400);
        }
    }

    public function deleteCarAd($data)
    {
        $id = $data['id'];
        $car = Flight::carService()->getCarsById($id);
        if (isset($car['car_id'])) {
            return $this->dao->deleteCarAd($data);
        } else {
            return Flight::json(['message' => 'Vehicle ID invalid.'], 400);
        }
    }
}
