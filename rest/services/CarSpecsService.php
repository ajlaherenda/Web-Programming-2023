<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarSpecsDao.class.php";


class CarSpecsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CarSpecsDao);
    }

    public function add_car_specs($entity) {

        return $this->dao->add_car_specs($entity);
      }
    
      public function update_car_specs($id, $entity) {
    
        return $this->dao->update_car_specs($id, $entity);
      }
    
      public function delete_car_specs($id) {
    
        return $this->dao->delete_car_specs($id);
      }
}