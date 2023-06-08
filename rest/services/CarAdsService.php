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
        return $this->dao->updateCarAd($data);
    }

    public function deleteCarAd($data)
    {
        return $this->dao->deleteCarAd($data);
    }
}
