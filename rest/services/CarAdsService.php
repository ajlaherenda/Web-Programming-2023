<?php

namespace Services;

require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarAdsDao.class.php";


class CarAdsService extends BaseService
{
  /**
  * constructor of dao class
  */
  public function __construct(){
    parent::__construct(new CarAdsDao);
  }

  public function add_car_ad($entity) {

    return $this->dao->add_car_ad($entity);
  }

  public function update_car_ad($id, $entity) {

    return $this->dao->update_car_ad($id, $entity);
  }

  public function delete_car_ad($id) {

    return $this->dao->delete_car_ad($id);
  }



}
?>