<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/LocationDao.class.php';

use PHPUnit\Framework\TestCase;

final class LocationDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $locationDao = new LocationDao("locations");
        $this->assertSame('locations', $locationDao->getTableName());
    }
    // below we ensure that the name of the location at 71000 is actually Sarajevo
    public function testGetById()
    {
        $locationDao = new LocationDao("locations");
        $location = $locationDao->getById('71000');
        $this->assertSame('Sarajevo', $location['location_name']);
    }
}
