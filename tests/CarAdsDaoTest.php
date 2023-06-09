<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/CarAdsDao.class.php';

use PHPUnit\Framework\TestCase;

final class CarAdsDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $carAdsDao = new CarAdsDao("car_ads");
        $this->assertSame('car_ads', $carAdsDao->getTableName());
    }
}
