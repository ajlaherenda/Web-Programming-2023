<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/CarDao.class.php";


class CarService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CarDao);
    }

    function get_cars_by_id($id)
    {
        return $this->dao->get_cars_by_id($id);
    }

    function get_cars_by_location($id)
    {
        return $this->dao->get_cars_by_location($id);
    } 

    function get_cars_search_tool($entity)
    {
        return $this->dao->get_cars_search_tool($entity);
    }

    function get_cars_based_on_ad_status($ad_status)
    {
        return $this->dao->get_cars_based_on_ad_status($ad_status);
    }

    function add_car($entity)
    {
        return $this->dao->add_car($entity);
    }

    function update_car($id, $entity) {

        return this->dao->update_car($id, $entity);
    }

    function delete_car($id)
    {
        return $this->dao->delete_car($id);
    }


}
?>
