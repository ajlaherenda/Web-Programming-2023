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

    public function addTestDrive($entity)
    {
        $emailBody = "You have successfully booked a test drive for the vehicle " . $entity['vehicle'] . ". We are looking forward to your visit!";
        $email = $entity['email'];
        $full_name = $entity['name'] . " " . $entity['surname'];
        $this->mailer->sendEmail("Test Drive Booking", $emailBody, $email, $full_name);
        return $this->dao->addTestDrive($entity);
    }
}
