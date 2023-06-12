<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/LocationDao.class.php';

use PHPUnit\Framework\TestCase;

final class LocationDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $lcoationDao = new LocationDao("locations");
        $this->assertSame('locations', $locationDao->getTableName());
    }
}
