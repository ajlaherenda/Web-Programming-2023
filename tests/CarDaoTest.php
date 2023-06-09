<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/CarDao.class.php';

use PHPUnit\Framework\TestCase;

final class CarDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $carDao = new CarDao("cars");
        $this->assertSame('cars', $carDao->getTableName());
    }
    // we test if the number of vehicles matching the search parameters is 2
    public function testSearchTool()
    {
        $carDao = new CarDao("cars");
        $searchParam = "Audi A5";
        $searchResult = $carDao->searchTool($searchParam);
        $this->assertCount(2, $searchResult);
    }
    // tested is if the number of incoming cars is actually 2
    public function testGetCarsBasedOnAdStatus()
    {
        $carDao = new CarDao("cars");
        $cars = $carDao->getCarsBasedOnAdStatus('INCOMING');
        $this->assertCount(2, $cars);
    }
    // we check if the id is indeed unique for vehicles
    public function testGetCarsById()
    {
        $carDao = new CarDao("cars");
        $car = $carDao->getCarsById('1');
        $this->assertCount(1, $car);
    }
}
