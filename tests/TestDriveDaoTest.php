<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/TestDriveDao.class.php';

use PHPUnit\Framework\TestCase;

final class TestDriveDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $testDriveDao = new TestDriveDao("testdrives");
        $this->assertSame('testdrives', $testDriveDao->getTableName());
    }
    // we assert that there are no booked test drives with the given vehicle, date and time of test drive
    public function testCheckAvailability1()
    {
        $car = "Audi A4 2021 Serial number: S152763866";
        $date = "11.6.2023.";
        $time = "AM";
        $testDriveDao = new TestDriveDao("testdrives");
        $bookedTestDrive = $testDriveDao->checkAvailability($car, $date, $time);
        $this->assertEmpty($bookedTestDrive);
    }
    // we assert that there are is a booked test drive with the given vehicle, date and time of test drive
    // additionaly there can be only 1 for that vehicle, that date and period of day!
    public function testCheckAvailability2()
    {
        $car = "Mercedes GLC 400 D 2019 Serial number: S072220628";
        $date = "23.6.2023.";
        $time = "PM";
        $testDriveDao = new TestDriveDao("testdrives");
        $bookedTestDrive = $testDriveDao->checkAvailability($car, $date, $time);
        $this->assertCount(1, $bookedTestDrive);
    }
}
