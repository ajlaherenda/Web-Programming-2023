<?php

require_once __DIR__ . '/../rest/dao/BaseDao.class.php';
require_once __DIR__ . '/../rest/dao/AdminDao.class.php';

use PHPUnit\Framework\TestCase;

final class AdminDaoTest extends TestCase
{
    // in the test below we check if the connection has been established and further check if that is the proper table
    public function testDBConnection()
    {
        $adminDao = new AdminDao("admins");
        $this->assertSame('admins', $adminDao->getTableName());
    }
    // the test ensures that there is not admin in the database with the username "ime"
    public function testGetAdminByUsername()
    {
        $adminDao = new AdminDao("admins");
        $username = "ime";
        $admin = $adminDao->getAdminByUsername($username);
        $this->assertEmpty($admin);
    }
    // we check that the password for the admin with username "admin" is not "1234"
    public function testGetAdminByUsernamePass()
    {
        $adminDao = new AdminDao("admins");
        $admin = $adminDao->getAdminByUsername("admin");
        $this->assertNotSame("1234", $admin['password']);
    }
}
