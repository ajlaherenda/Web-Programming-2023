<?php

require_once 'BaseService.php';
require_once __DIR__ . "/../dao/TestDriveDao.class.php";
require_once __DIR__ . '/../utils/EMailer.class.php';

class TestDriveService extends BaseService
{
    public $mailer;
    public function __construct()
    {
        parent::__construct(new TestDriveDao());
        $this->mailer = new EMailer();
    }

    public function addTestDrive($data)
    {
        $car = $data['vehicle'];
        $date = $data['date'];
        $time = $data['time'];
        $testDrive = Flight::testDriveService()->checkAvailability($car, $date, $time);
        if (isset($testDrive['id'])) {
            return 0;
        } else {
            $emailBody = "You have successfully booked a test drive for the vehicle " . $data['vehicle'] . ". We are looking forward to your visit! 
            See you on the " . $data['date'] . " around " . $data['time'] . "!";
            $email = $data['email'];
            $full_name = $data['name'] . " " . $data['surname'];
            $this->mailer->sendEmail("Test Drive Booking", $emailBody, $email, $full_name);
            return $this->dao->addTestDrive($data);
        }
    }
    public function checkAvailability($car, $date, $time)
    {
        return $this->dao->checkAvailability($car, $date, $time);
    }
}
